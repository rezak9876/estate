<?php

namespace Modules\Single\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Estate\Entities\Estate;
use Modules\Facility\Entities\Facility;
use Modules\Neighborhood\Entities\Neighborhood;
use Modules\Province\Entities\Province;
use Modules\Term\Entities\Term;
use Modules\UseType\Entities\UseType;
use Modules\UseTypeProperty\Entities\UseTypeProperty;

class SingleController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('single::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('single::create');
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
        $estate = Estate::whereStatus('approved')->where('slug', $slug)->firstOrfail();
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
        $estates = Estate::limit(3)->get();

//        return view('frontend::show', compact(['estate', 'estates', 'facilities', 'terms', 'new_estates', 'similar_estates', 'usetypes', 'usetypesproperties', 'facilities', 'terms', 'provinces', 'neighborhoods', 'estates', 'extremum']));
        return view('single::index', compact(['estate', 'estates', 'facilities', 'terms', 'new_estates', 'similar_estates', 'usetypes', 'usetypesproperties', 'facilities', 'terms', 'provinces', 'neighborhoods', 'estates', 'extremum']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('single::edit');
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
