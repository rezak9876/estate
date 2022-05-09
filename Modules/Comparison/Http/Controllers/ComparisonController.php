<?php

namespace Modules\Comparison\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Estate\Entities\Estate;
use Modules\Estate\Transformers\EstateComparison;
use Modules\Facility\Entities\Facility;

class ComparisonController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if (isset($_COOKIE['comparison_estates'])) {
            $array = explode(',', $_COOKIE['comparison_estates']);
            $estates = Estate::wherein('id', $array)->limit(3)->get();
            $facilities = Facility::all();
            return view('comparison::index', compact(['estates', 'facilities']));
        } else
            return 'موردی برای مقایسه انتخاب نشده است.';
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function compare_slide_menu(Request $request)
    {
        $array_id = $request->array_id;
        $array_id = explode(",", $array_id);
        $estates = Estate::whereIn('id', $array_id)->get();
        return EstateComparison::collection($estates);
    }
}
