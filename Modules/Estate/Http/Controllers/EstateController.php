<?php

namespace Modules\Estate\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Estate\Entities\Estate;
use Modules\Estate\Transformers\EstateComparison;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function estate_by_id()
    {
        $estate = Estate::find(request()->id);
        return new EstateComparison($estate);
    }
}
