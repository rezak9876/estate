<?php

namespace Modules\Estate\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\City\Entities\City;
use Modules\Estate\Entities\Estate;
use Modules\Estate\Entities\Gallery;
use Modules\Estate\Http\Requests\EstateRequest;
use Modules\Estate\Transformers\EstateCollection;
use Modules\Estate\Transformers\EstateResource;
use Modules\Estate\Transformers\EstateShowResource;
use Modules\Estate\Transformers\TermEstateFormResource;
use Modules\Facility\Entities\Facility;
use Modules\Neighborhood\Entities\Neighborhood;
use Modules\Province\Entities\Province;
use Modules\Region\Entities\Region;
use Modules\Term\Entities\Term;

class EstateController extends Controller
{

    public static $prefix_images = 'images/estate';
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $estates = Estate::orderBy('created_at', 'desc')->get();
        return response()->json(new EstateCollection($estates), 200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $txt_facilities = Facility::where('type',Facility::Text)->pluck('title','id');
        $int_facilities = Facility::where('type',Facility::Integer)->pluck('title','id');
        $bool_facilities = Facility::where('type',Facility::Check_box)->pluck('title','id');
        $terms = Term::pluck('title','id');
        return response()->json([
            'txt_facilities' =>$txt_facilities,
            'int_facilities' =>$int_facilities,
            'bool_facilities' =>$bool_facilities,
            'terms' =>$terms,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     * @param EstateRequest $request
     * @return Renderable
     */
    public function store(EstateRequest $request)
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
            // $this->create_thumbnail_picture($image_path, $name);
            $request->merge([
                'main_picture' => $name,
            ]);
        }


        $estate = Auth::user()->estates()->create($request->all());

        if ($request->hasfile('galleries')) {
            $files = $request->file('galleries');
            foreach ($files as $file) {
                $name = $this->image_name($request->slug, $file->extension());
                $this->save_picture($file, $name);
                $gallery = new Gallery();
                $gallery->path = $name;
                $gallery->estate_id = $estate->id;
                $gallery->save();
            }
        }

        $estate->terms()->attach($request->terms);


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
        $estate->intfacilities()->attach($int_facilities);

        $txt_facilities = collect($request->txt_facilities, [])
            ->map(function ($facility) {
                return ['value' => $facility];
            });
        $estate->txtfacilities()->attach($txt_facilities);


        $estate->boolfacilities()->attach($request->bool_facilities);

        return response()->json([
            'message' => 'آگهی با موفقیت ساخته شد.'
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Estate $estate)
    {
        return response()->json([
            'data' => new EstateShowResource($estate)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('estate::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
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



    protected function delete_picture($picture_name, $has_thumbnail = true)
    {
        unlink(self::$prefix_images . '/' . $picture_name);
        if ($has_thumbnail)
            unlink(self::$prefix_images . '/' . Gallery::$prefix_thumbnail . $picture_name);
    }

    protected function save_picture($file, $name)
    {
        // $setting = Setting::first();
        if (false) {
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
}
