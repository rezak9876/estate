<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Estate\Entities\Gallery;
use Modules\Role\Entities\Role;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Transformers\UserCollection;
use Modules\User\Transformers\UserResource;


class UserController extends Controller
{
    use AuthorizesRequests;
    public static $prefix_images = 'images/users';

    public function __construct()
    {
        // $this->authorizeResource(User::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return response()->json(new UserCollection($users), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserRequest $request)
    {
        //        $this->validateUser($request);
        $request_data = $request->except(['picture']);
        if ($request->hasfile('picture')) {

            $file = $request->file('picture');
            $name = $this->image_name($request->slug, $file->extension());
            $image_path = $this->image_path($name);
            $this->save_picture($file, $name);
            // resize image instance
            // $this->create_thumbnail_picture($image_path, $name);
            $request_data['picture']= $name;
        }
        $user = new User();
        $user->create($request_data);
        
        return response()->json([
            'message' => 'کاربر با موفقیت ساخته شد.'
        ], 201);
    }

       /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $roles = Role::pluck('title', 'id');
        return response()->json([
            'data' =>  [
               'roles' => $roles
            ]
        ]);
    }


    /**
     * Show the profile for a given user.
     *
     * @param  User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return response()->json([
            'data' => new UserResource($user)
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UserRequest $request, User $user)
    {
        $request_data = $request->except(['picture']);
        if ($request->delete_picture != null) {
            $this->delete_picture($user->picture);
            $request_data['picture']=null;
        }



        if ($request->hasfile('picture')) {
            if ($user->picture) {
                $this->delete_picture($user->picture);
            }
            $file = $request->file('picture');
            $name = $this->image_name($request->slug, $file->extension());
            $image_path = $this->image_path($name);
            $this->save_picture($file, $name);
            // resize image instance
            // $this->create_thumbnail_picture($image_path, $name);
            $request_data['picture']=$name;

        }

        if ($request_data['password'] == null) {
            unset($request_data['password']);
        }else{
            $request_data['password'] = Hash::make($request->password);
        }

        $user->update($request_data);
        return response()->json([
            'message' => 'کاربر با موفقیت آپدیت شد.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(User $user)
    {
        if ($user->picture) {
            $this->delete_picture($user->picture);
        }
        $user->delete();
        return response()->json([
            'message' => 'کاربر با موفقیت حذف شد.'
        ], 200);
    }


    // has_thumbnail was true
    protected function delete_picture($picture_name, $has_thumbnail = false)
    {
        if (file_exists(self::$prefix_images . '/' . $picture_name)) {
            unlink(self::$prefix_images . '/' . $picture_name);
            if ($has_thumbnail)
                unlink(self::$prefix_images . '/' . Gallery::$prefix_thumbnail . $picture_name);
        }
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

    protected function image_name($slug, $extension)
    {
        return rand() . $slug . '.' . $extension;
    }


    protected function image_path($name)
    {
        return self::$prefix_images . '/' . $name;
    }

    public function login_user()
    {
        $user = Auth::user();
        $permissions = $user->permissions;
        $response = [];
        foreach($user->permissions as $permission)
        {
            $slug = explode(".",$permission->slug);
            if( array_key_exists($slug[0],$response))
            {
                array_push($response[$slug[0]],$slug[1]);

            }else{
                $response[$slug[0]]=[$slug[1]];
            }
        }
        return response()->json(['permissions' => $response]);
    }
}
