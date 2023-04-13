<?php

namespace Modules\Frontend\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Estate\Entities\Estate;
use Modules\Facility\Entities\Facility;
use Modules\Neighborhood\Entities\Neighborhood;
use Modules\Province\Entities\Province;
use Modules\Term\Entities\Term;
use Modules\UseType\Entities\UseType;
use Modules\UseTypeProperty\Entities\UseTypeProperty;

class FrontendController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function filterd_estates(Request $request)
    {
        $request->min_total_price *= 1000000;
        $request->max_total_price *= 1000000;
        $request->min_rent_price *= 1000000;
        $request->max_rent_price *= 1000000;
        $request->min_mortgage_price *= 1000000;
        $request->max_mortgage_price *= 1000000;


        //        $province = Province::with('cities.regions')->find($request->province);
        //

        $estates = Estate::query();
        $estates = Estate::with([
            'intfacilities', 'txtfacilities', 'boolfacilities'
        ])
            ->where([
                ['type', $request->type],
                //                ['type', $request->type],
            ])
            ->whereHas('neighborhood.region.city', function ($q) use ($request) {
                $q->where('province_id', $request->province);
            });
        if ($request->neighborhoods)
            $estates->whereIn('neighborhood_id', $request->neighborhoods);
        if ($request->usetypeproperties) {
            $estates->whereHas('use_type_property', function ($query) use ($request) {
                $query->whereIn('use_type_id', $request->usetypeproperties);
            });
            //            $estates->whereIn('use_type_property_id', $request->usetypeproperties);
        }
        if ($request->type == Estate::Mortgage_Rent) {
            $estates
                ->whereBetween('rent_price', [$request->min_rent_price, $request->max_rent_price])
                ->whereBetween('mortgage_price', [$request->min_mortgage_price, $request->max_mortgage_price]);
        } else {
            $estates
                ->whereBetween('total_price', [$request->min_total_price, $request->max_total_price]);
        }

        $estates->whereBetween('area', [$request->min_area, $request->max_area]);
        $estates->whereBetween('year_of_construction', [$request->min_year_of_construction, $request->max_year_of_construction]);
        if ($request->photo_estate)
            $estates->has('galleries');

        if ($request->terms) {
            foreach (array_keys($request->terms) as $term) {
                $estates->whereHas('terms', function ($query) use ($term) {
                    $query->where('term_id', $term);
                });
            }
        }

        if ($request->check_box_facility) {
            foreach (array_keys($request->check_box_facility) as $facility) {
                $estates->whereHas('boolfacilities', function ($query) use ($facility) {
                    $query->where('facility_id', $facility);
                });
            }
        }

        $facilities = Facility::where('type', Facility::Integer)->get();

        foreach ($facilities as $facility) {
            if ($facility->type == Facility::Integer) {
                $id = $facility->id;
                $estates->whereHas('intfacilities', function ($q) use ($request, $id) {
                    $q->where('facility_id', $id)->whereBetween('value', [$request->min_facility[$id], $request->max_facility[$id]]);
                });
            }
        }

        $estates->where('status', 'approved');

        return $estates;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function filter(Request $request)
    {


        $estates = $this->filterd_estates($request);

        $estates = $estates->offset($request->step)->limit(10)->get();

        if ($estates->count() > 0)
            return view('frontend::layouts.estates', compact(['estates']));
        else
            return response()->json(['message' => 'عملیات با موفقیت انجام شد', 'status' => 'success', 'estates_status' => false]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frontend::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($slug)
    {
        $estate = Estate::where('slug', $slug)->first();
        $neighborhood_id = $estate->neighborhood_id;
        $similar_estates = Estate::where('id', '!=', $estate->id)->where('neighborhood_id', $neighborhood_id)->limit(2)->get();
        $new_estates = Estate::orderBy('created_at', 'desc')->limit(2)->get();


        $usetypes = UseType::all();
        $usetypesproperties = UseTypeProperty::all();
        $facilities = Facility::all();
        $terms = Term::all();
        $provinces = Province::all();
        $neighborhoods = Neighborhood::all();
        $estates = Estate::all();
        $min_total_price = floor($estates->min('total_price') / 1000000);
        $min_mortgage = floor($estates->min('mortgage_price') / 1000000);
        $min_rent = floor($estates->min('rent_price') / 1000000);
        $max_total_price = floor($estates->max('total_price') / 1000000);
        $max_mortgage = floor($estates->max('mortgage_price') / 1000000);
        $max_rent = floor($estates->max('rent_price') / 1000000);
        $min_area = $estates->min('area');
        $max_area = $estates->max('area');
        foreach ($facilities as $facility) {
            if ($facility->type == Facility::Integer) {
                Estate::with(['intfacilities' => function ($query) use (&$max_facility, &$min_facility, $facility) {
                    $max_facility[$facility->id] = $query->where('facility_id', $facility->id)->max('value');
                }])->get();
            }
        }
        foreach ($facilities as $facility) {
            if ($facility->type == Facility::Integer) {
                Estate::with(['intfacilities' => function ($query) use (&$max_facility, &$min_facility, $facility) {
                    $min_facility[$facility->id] = $query->where('facility_id', $facility->id)->min('value');
                }])->get();
            }
        }
        $extremum = [
            'min_total_price' => $min_total_price - fmod($min_total_price, 10),
            'min_mortgage_price' => $min_mortgage - fmod($min_mortgage, 10),
            'min_rent_price' => $min_rent - fmod($min_rent, 10),
            'max_total_price' => 10 + $max_total_price - fmod($max_total_price, 10),
            'max_mortgage_price' => 10 + $max_mortgage - fmod($max_mortgage, 10),
            'max_rent_price' => 10 + $max_rent - fmod($max_rent, 10),
            'min_area' => $min_area - fmod($min_area, 10),
            'max_area' => 10 + $max_area - fmod($max_area, 10),
            'min_facility' => $min_facility,
            'max_facility' => $max_facility,
        ];

        return view('frontend::show', compact(['estate', 'estates', 'facilities', 'terms', 'new_estates', 'similar_estates', 'usetypes', 'usetypesproperties', 'facilities', 'terms', 'provinces', 'neighborhoods', 'estates', 'extremum']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frontend::edit');
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
}
