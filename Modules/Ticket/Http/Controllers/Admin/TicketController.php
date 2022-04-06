<?php

namespace Modules\Ticket\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Transformers\TicketCollection;

class TicketController extends Controller
{
    
    use AuthorizesRequests;
    public static $prefix_images = 'images/ticket';
    public function __construct()
    {
        // $this->authorizeResource(Ticket::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $login_user = Auth::user();
        // $tickets = Ticket::orderBy('created_at', 'desc')->get()->filter(function ($ticket) use ($login_user) {
        //     return $login_user->can('view', $ticket);
        // });

        $tickets = Ticket::orderBy('created_at', 'desc')->get();
        return response()->json(new TicketCollection($tickets), 200);
    }

     /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return 'hi';
        // return response()->json([
        //     'data' => new TicketShowResource($ticket)
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $types = [
            0 => 'خرید و فروش',
            1 => 'رهن و اجاره',
            2 => 'پیش فروش',
            3 => 'معاوضه',
        ];
        $use_type_property_id = [
            'maskooni' => [
                'persianName' => 'مسکونی',
                'options' => [
                    1 => "آپارتمان / برج",
                    2 => "ویلایی / باغ و باغچه",
                    3 => "مستغلات",
                    4 => "زمین / کلنگی",
                    5 => "پنت هاوس",
                    6 => "سایر",
                ]
            ],
            'edaritejari' => [
                'persianName' => 'اداری تجاری',
                'options' => [
                    7 => "دفتر کار, اتاق اداری و مطب",
                    8 => "مغازه",
                    9 => "انبار, سوله, کارگاه و کارخانه",
                    10 => "کشاورزی",
                    11 => "مستغلات",
                    12 => "زمین/کلنگی",
                    13 => "سایر",
                ]
            ]
        ];
        $txt_facilities = Facility::where('type', Facility::Text)->pluck('title', 'id');
        $int_facilities = Facility::where('type', Facility::Integer)->pluck('title', 'id');
        $bool_facilities = Facility::where('type', Facility::Check_box)->pluck('title', 'id');
        $terms = Term::pluck('title', 'id');
        return response()->json([
            'types' => $types,
            'txt_facilities' => $txt_facilities,
            'int_facilities' => $int_facilities,
            'bool_facilities' => $bool_facilities,
            'terms' => $terms,
            'use_type_property_id' => $use_type_property_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param TicketRequest $request
     * @return Renderable
     */
    public function store(TicketRequest $request)
    {
        $province_id = $this->check_province($request->province);
        $city_id = $this->check_city($request->city, $province_id);
        $region_id = $this->check_region($request->region, $city_id);
        $neighborhood_id = $this->check_neighborhood($request->neighborhood, $region_id);
        $request->merge([
            'neighborhood_id' => $neighborhood_id,
        ]);
        if ($request->hasfile('main_pic')) {

            $file = $request->file('main_pic');
            $name = $this->image_name($request->slug, $file->extension());
            $image_path = $this->image_path($name);
            $this->save_picture($file, $name);
            // resize image instance
            $this->create_thumbnail_picture($image_path, $name);
            $request->merge([
                'main_picture' => $name,
            ]);
        }


        $ticket = Auth::user()->tickets()->create($request->all());

        if ($request->hasfile('galleries')) {
            $files = $request->file('galleries');
            foreach ($files as $file) {
                $name = $this->image_name($request->slug, $file->extension());
                $this->save_picture($file, $name);
                $gallery = new Gallery();
                $gallery->path = $name;
                $gallery->ticket_id = $ticket->id;
                $gallery->save();
            }
        }

        $ticket->terms()->attach($request->terms);


        //Setting zero unregistered integer facilities
        $facilities_array = [];
        foreach ($request->int_facilities as $id => $facility) {
            if ($facility == null) {
                $facilities_array[$id] = 0;
            } else
                $facilities_array[$id] = $facility;
        }


        $int_facilities = collect($facilities_array, [])
            ->map(function ($facility) {
                return ['value' => $facility];
            });
        $ticket->intfacilities()->attach($int_facilities);

        $txt_facilities = collect($request->txt_facilities, [])
            ->map(function ($facility) {
                return ['value' => $facility];
            });
        $ticket->txtfacilities()->attach($txt_facilities);


        $ticket->boolfacilities()->attach($request->bool_facilities);

        return response()->json([
            'message' => 'آگهی با موفقیت ساخته شد.'
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Ticket $ticket)
    {
        return response()->json([
            'data' => new TicketShowResource($ticket)
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        if ($request->delete_galleries != null) {
            foreach ($request->delete_galleries as $delete_gallery_id) {
                $gallery = Gallery::find($delete_gallery_id);
                $this->delete_picture($gallery->path);
                $gallery->delete();
            }
        }
        if ($request->delete_main_picture != null) {
            $this->delete_picture($ticket->main_picture, true);
            $request->merge([
                'main_picture' => null,
            ]);
        }
        $province_id = $this->check_province($request->province);
        $city_id = $this->check_city($request->city, $province_id);
        $region_id = $this->check_region($request->region, $city_id);
        $neighborhood_id = $this->check_neighborhood($request->neighborhood, $region_id);
        $request->merge([
            'neighborhood_id' => $neighborhood_id,
        ]);
        if ($request->hasfile('main_pic')) {
            if ($ticket->main_picture) {
                $this->delete_picture($ticket->main_picture, true);
            }
            $file = $request->file('main_pic');
            $name = $this->image_name($request->slug, $file->extension());
            $image_path = $this->image_path($name);
            $this->save_picture($file, $name);
            // resize image instance
            $this->create_thumbnail_picture($image_path, $name);
            $request->merge([
                'main_picture' => $name,
            ]);
        }
        $ticket->update($request->all());
        $ticket->terms()->sync($request->terms);
        $int_facilities = collect($request->int_facilities, [])
            ->map(function ($facility) {
                return ['value' => $facility];
            });
        $ticket->intfacilities()->sync($int_facilities);

        $txt_facilities = collect($request->txt_facilities, [])
            ->map(function ($facility) {
                return ['value' => $facility];
            });
        $ticket->txtfacilities()->sync($txt_facilities);


        $ticket->boolfacilities()->sync($request->bool_facilities);

        if ($request->hasfile('galleries')) {
            $files = $request->file('galleries');
            foreach ($files as $file) {
                $name = $this->image_name($request->slug, $file->extension());
                $this->save_picture($file, $name);
                $gallery = new Gallery();
                $gallery->path = $name;
                $gallery->ticket_id = $ticket->id;
                $gallery->save();
            }
        }
        return response()->json([
            'message' => 'آگهی با موفقیت آپدیت شد.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Ticket $ticket)
    {
        try {
            foreach ($ticket->galleries as $gallery) {
                $this->delete_picture($gallery->path);
            }
            if ($ticket->main_picture) {
                $this->delete_picture($ticket->main_picture, true);
            }
        } finally {
            $ticket->delete();
            return response()->json([
                'message' => 'آگهی با موفقیت حذف شد.'
            ], 200);
        }
    }


    protected function check_province($province_title)
    {
        $province = Province::where('title', $province_title)->first();
        if ($province == null) {
            $province = new Province();
            $province->title = $province_title;
            $province->save();
        }
        return $province->id;
    }

    protected function check_city($city_title, $province_id)
    {
        $city = City::where('title', $city_title)->where('province_id', $province_id)->first();
        if ($city == null) {
            $city = new City();
            $city->title = $city_title;
            $city->province_id = $province_id;
            $city->save();
        }
        return $city->id;
    }

    protected function check_region($region_title, $city_id)
    {
        $region = Region::where('title', $region_title)->where('city_id', $city_id)->first();
        if ($region == null) {
            $region = new Region();
            $region->title = $region_title;
            $region->city_id = $city_id;
            $region->save();
        }
        return $region->id;
    }

    protected function check_neighborhood($neighborhood_title, $region_id)
    {
        $neighborhood = Neighborhood::where('title', $neighborhood_title)->where('region_id', $region_id)->first();
        if ($neighborhood == null) {
            $neighborhood = new Neighborhood();
            $neighborhood->title = $neighborhood_title;
            $neighborhood->region_id = $region_id;
            $neighborhood->save();
        }
        return $neighborhood->id;
    }


    // has_thumbnail was true
    protected function delete_picture($picture_name, $has_thumbnail = false)
    {
        unlink(self::$prefix_images . '/' . $picture_name);
        if ($has_thumbnail)
            unlink(self::$prefix_images . '/' . Gallery::$prefix_thumbnail . $picture_name);
    }

    protected function save_picture($file, $name)
    {
        $setting = Setting::first();
        if ($setting->watermarkActive) {
            // open an image file
            $img = Image::make($file);
            // insert a watermark
            $img->insert(Setting::PATH_UPLOAD . $setting->watermark, $setting->watermarkPosition);
            // save image in desired format
            $img->save(self::$prefix_images . '/' . $name);
            return self::$prefix_images . '/' . $name;
        } else {
            $file->move(self::$prefix_images, $name);
            return self::$prefix_images . '/' . $name;
        }
    }

    protected function create_thumbnail_picture($file, $name)
    {
        // open an image file
        $img = Image::make($file);
        // resize image instance
        $img->resize(320, 240);
        // save image in desired format
        $img->save(self::$prefix_images . '/' . Gallery::$prefix_thumbnail . $name);
    }

    protected function image_name($slug, $extension)
    {
        return rand() . $slug . '.' . $extension;
    }

    protected function image_path($name)
    {
        return self::$prefix_images . '/' . $name;
    }



    public function uploadexcel(Request $request)
    {
        // check permission
        $this->authorize('excel', Ticket::class);
        // validation
        $validator = Validator::validate($request->all(), [
            //use this
            'excelfile' => 'required|max:50000|mimes:xlsx,doc,docx,ppt,pptx,ods,odt,odp'
        ], [
            'mimes' => 'فرمت فایل اکسل نامعتبر است',
        ]);

        // excel to collection
        ob_end_clean();
        ob_start();
        $excel_collection = \Excel::toCollection(new TicketImport, $request->file('excelfile'));

        // check required keys in first row of table
        $required_keys = ['taadad_atak', 'amkanat', 'shrayt', 'noaa', 'noaa_mlk', 'mtrazh', 'sal_sakht', 'kymt_khryd', 'aanoan', 'aslag', 'todyhat', 'aard_gghrafyayy', 'tol_gghrafyayy', 'astan', 'shhr', 'mntkh', 'mhlh', 'adrs'];
        if (count(array_intersect(array_keys($excel_collection[0][0]->toArray()), $required_keys)) != count($required_keys)) {
            throw ValidationException::withMessages(['excelfile' => 'فایل اکسل فیلد های الزامی را ندارد']);
        }

        $results_array = [];
        foreach ($excel_collection[0] as $row) {

            // generate int facilities array
            $int_facilities = Facility::whereType(Facility::Integer)->pluck('title', 'id')->toArray();
            foreach ($int_facilities as $key => $value) {
                switch ($value) {
                    case 'تعداد اتاق':
                        $int_facilities[$key] = $row['taadad_atak'];
                        break;
                }
            }

            // generate bool facilities array
            if ($row['amkanat']) {
                $facility_array = explode('،', $row['amkanat']);
                $facility_array = array_map(function ($title) {
                    $title = trim($title);
                    return Facility::whereTitle($title)->first()->id;
                }, $facility_array);
            } else
                $facility_array = null;


            // generate terms array

            if ($row['shrayt']) {
                $terms_array = explode('،', $row['shrayt']);
                $terms_array = array_map(function ($title) {
                    $title = trim($title);
                    return Term::whereTitle($title)->first()->id;
                }, $terms_array);
            } else
                $terms_array = null;


            $params = [
                "type" => Ticket::get_type_id_by_title($row['noaa']),
                "use_type_property_id" => UseTypeProperty::whereTitle($row['noaa_mlk'])->first()->id,
                "area" => $row['mtrazh'],
                "year_of_construction" => $row['sal_sakht'],
                "total_price" => $row['kymt_khryd'],
                "title" => $row['aanoan'],
                "slug" => $row['aslag'],
                "description" => $row['todyhat'],
                "latitude" => $row['aard_gghrafyayy'],
                "longitude" => $row['tol_gghrafyayy'],
                "province" => $row['astan'],
                "city" => $row['shhr'],
                "region" => $row['mntkh'],
                "neighborhood" => $row['mhlh'],
                "address" => $row['adrs'],
                "int_facilities" =>  $int_facilities,
                "bool_facilities" => $facility_array,
                "terms" => $terms_array,
            ];

            // validate params
            $objetoRequest = new TicketRequest($params);
            try {
                $objetoRequest->validate($objetoRequest->rules());
            } catch (Exception $e) {
                $error_messages_array = $e->validator->getMessageBag()->getMessages();
                $error_messages = reset($error_messages_array)[0];
                $result = [
                    'title' => $row['aanoan'],
                    'status' => 'failed',
                    'message' => $error_messages
                ];
                array_push($results_array, $result);
                continue;
            }

            // store ticket
            $y = (new TicketController())->store($objetoRequest);

            // generate result array for show in table
            $result = [
                'title' => $row['aanoan'],
                'status' => 'success',
                'message' => $y->original['message']
            ];
            array_push($results_array, $result);
        }
        return response()->json([
            'message' => 'اکسل با موفقیت ثبت شد.',
            'data' => $results_array,
        ], 200);
    }



    public function downloadexcel(Request $request)
    {
        // check permission
        $this->authorize('excel', Ticket::class);

        try {
            // delete previous file for prevent error
            unlink('files/estaet-export.xlsx');
            \Excel::store(new TicketsExport(), 'files/estaet-export.xlsx', 'real_public');
        } catch (Exception $e) {
            return response()->json([
                'message' => 'در حال حاضر قادر امکان ایجاد اکسل وجود ندارد',
            ], 500);
        }
        return response()->json([
            'message' => 'اکسل با موفقیت ایجاد شد.',
            'url' => 'files/estaet-export.xlsx'
        ], 200);
    }
}
