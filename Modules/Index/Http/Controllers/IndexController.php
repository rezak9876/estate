<?php

namespace Modules\Index\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Estate\Entities\Estate;
use Modules\Facility\Entities\Facility;
use Modules\Neighborhood\Entities\Neighborhood;
use Modules\Province\Entities\Province;
use Modules\Term\Entities\Term;
use Modules\UseType\Entities\UseType;
use Modules\UseTypeProperty\Entities\UseTypeProperty;

class IndexController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $usetypesproperties = UseTypeProperty::all();
        $usetypes = UseType::all();
        $provinces = Province::all();
        $neighborhoods = Neighborhood::all();
        $terms = Term::all();
        $facilities = Facility::all();
        $estates = Estate::query();
        $min_area = $estates->min('area');
        $max_area = $estates->max('area');
        $min_total_price = floor($estates->min('total_price') / 1000000);
        $max_total_price = floor($estates->max('total_price') / 1000000);
        $min_rent_price = floor($estates->min('rent_price') / 1000000);
        $max_rent_price = floor($estates->max('rent_price') / 1000000);
        $min_mortgage_price = floor($estates->min('mortgage_price') / 1000000);
        $max_mortgage_price = floor($estates->max('mortgage_price') / 1000000);
        foreach ($facilities as $facility) {
            if ($facility->type == Facility::Integer) {
                $x = DB::table('int_estate_facility')->where('facility_id', $facility->id)->selectRaw('MIN(CAST(value AS SIGNED))')->first();
                $min_facility[$facility->id] = reset($x);
            }
        }
        foreach ($facilities as $facility) {
            if ($facility->type == Facility::Integer) {
                $x = DB::table('int_estate_facility')->where('facility_id', $facility->id)->selectRaw('MAX(CAST(value AS SIGNED))')->first();
                $max_facility[$facility->id] = reset($x);
            }
        }
        $min_year_of_construction = $estates->min('year_of_construction');
        $max_year_of_construction = $estates->max('year_of_construction');
        $extremum = [
            'min_total_price' => $min_total_price - fmod($min_total_price, 10),
            'max_total_price' => 10 + $max_total_price - fmod($max_total_price, 10),
            'min_mortgage_price' => $min_mortgage_price - fmod($min_mortgage_price, 10),
            'max_mortgage_price' => 10 + $max_mortgage_price - fmod($max_mortgage_price, 10),
            'min_rent_price' => $min_rent_price - fmod($min_rent_price, 10),
            'max_rent_price' => 10 + $max_rent_price - fmod($max_rent_price, 10),
            'min_area' => $min_area - fmod($min_area, 10),
            'max_area' => 10 + $max_area - fmod($max_area, 10),
            'min_facility' => $min_facility,
            'max_facility' => $max_facility,
            'min_year_of_construction' => $min_year_of_construction,
            'max_year_of_construction' => $max_year_of_construction,
        ];
        $estates = Estate::whereStatus('approved')->limit(21)->get();
        return view('index::index',compact(['usetypes','provinces','neighborhoods','estates','extremum','terms' , 'facilities']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('index::create');
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
    public function show($id)
    {
        return view('index::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('index::edit');
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
