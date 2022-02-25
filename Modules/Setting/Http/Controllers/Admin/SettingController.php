<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Transformers\SettingResource;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('setting::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('setting::create');
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
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Setting $setting)
    {
        return response()->json([
            'data' => new SettingResource($setting)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Setting $setting)
    {
        if ($request->delete_main_picture != null) {
            $this->delete_picture($setting->main_picture);
            $request->merge([
                'main_picture' => null,
            ]);
        }
        $setting->update($request->all());

        if (!empty($request->file('logo'))   ) {
            $setting->logo = $this->UploadPictre($request->file('logo'));
        }
        if (!empty($request->file('watermark'))   ) {
            $setting->watermark = $this->UploadPictre($request->file('watermark'));
        }
        if (!empty($request->file('faIco'))   ) {
            $setting->faIco = $this->UploadPictre($request->file('faIco'));
        }
        if (!empty($request->file('noticeBannerTopImage'))   ) {
            $setting->noticeBannerTopImage = $this->UploadPictre($request->file('noticeBannerTopImage'));
        }
        if (!empty($request->file('main_page_pic'))   ) {
            $setting->main_page_pic = $this->UploadPictre($request->file('main_page_pic'));
        }
        if (!empty($request->file('search_page_pic'))   ) {
            $setting->search_page_pic = $this->UploadPictre($request->file('search_page_pic'));
        }

        $setting->save();
        return response()->json([
            'message' => 'تنظیمات با موفقیت آپدیت شد.'
        ], 200);
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

    protected function UploadPictre($fileRequest)
    {
        //==============original image
        $filename =    time() . rand(1000, 10000000) . "." . $fileRequest->getClientOriginalExtension();
        $fileRequest->move(Setting::PATH_UPLOAD, $filename);
        return $filename;
    }
}
