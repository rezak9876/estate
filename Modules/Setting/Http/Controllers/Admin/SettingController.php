<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Setting\Transformers\SettingResource;

class SettingController extends Controller
{
    public static $prefix_images = 'images/setting';

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
    public function store(SettingRequest $request)
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
    public function update(SettingRequest $request, Setting $setting)
    {
        $pictures = ['logo', 'faIco', 'watermark', 'main_page_pic', 'search_page_pic'];
        foreach ($pictures as $picture) {
            $x = 'delete_' . $picture;
            if ($request->$x != null) {
                $this->delete_picture($setting->$picture);
                $setting->$picture = null;
            }
            if (!empty($request->file($picture))) {
                if ($setting->$picture) {
                    $this->delete_picture($setting->$picture);
                }
            }
        }
        $setting->update($request->all());

        foreach ($pictures as $picture) {
            if (!empty($request->file($picture))) {
                $setting->$picture = $this->UploadPictre($request->file($picture));
            }
        }


        $setting->save();
        return response()->json([
            'message' => __('messages.updated', ['name' => 'تنظیمات'])
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

    // has_thumbnail was true
    protected function delete_picture($picture_name)
    {
        if (file_exists(self::$prefix_images . '/' . $picture_name)) {
            unlink(self::$prefix_images . '/' . $picture_name);
        }
    }
}
