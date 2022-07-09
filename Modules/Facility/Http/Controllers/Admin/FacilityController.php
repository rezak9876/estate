<?php

namespace Modules\Facility\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Facility\Entities\Facility;
use Modules\Facility\Http\Requests\FacilityRequest;
use Modules\Facility\Transformers\FacilityCollection;
use Modules\Facility\Transformers\FacilityResource;

class FacilityController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Facility::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $facilities = Facility::orderBy('created_at', 'desc')->get();
        return response()->json(new FacilityCollection($facilities), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FacilityRequest $request)
    {
//        $this->validateFacility($request);
        $facility = new Facility();
        $facility->create($request->all());
        return response()->json([
            'message' => 'امکان با موفقیت ساخته شد.'
        ], 201);
    }


    /**
     * Show the profile for a given user.
     *
     * @param  Facility $facility
     * @return \Illuminate\View\View
     */
    public function edit(Facility $facility)
    {
        return response()->json([
            'data' => new FacilityResource($facility)
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(FacilityRequest $request, Facility $facility)
    {
        $facility->update($request->all());
        return response()->json([
            'message' => __('messages.updated', ['name' => 'امکان'])
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return response()->json([
            'message' => 'امکان با موفقیت حذف شد.'
        ], 200);

    }
}
