<?php

namespace Modules\Role\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Entities\Permission;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\RoleRequest;
use Modules\Role\Transformers\RoleCollection;
use Modules\Role\Transformers\RoleResource;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Role::class);
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $facilities = Role::orderBy('created_at', 'desc')->get();
        return response()->json(new RoleCollection($facilities), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RoleRequest $request)
    {
        //        $this->validateRole($request);
        $role = new Role();
        $role->create($request->all());
        $role->permissions()->attach($request->permissions);
        return response()->json([
            'message' => 'نقش با موفقیت ساخته شد.'
        ], 201);
    }



    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $permissions = Permission::pluck('title', 'id');
        return response()->json([
            'data' =>  [
                [
                    'persianName' => 'کاربران',
                    'children' =>Permission::where('slug', 'like', 'user.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'شرایط',
                    'children' =>Permission::where('slug', 'like', 'term.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'نقش ها',
                    'children' =>Permission::where('slug', 'like', 'role.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'صفحات',
                    'children' =>Permission::where('slug', 'like', 'page.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'امکانات',
                    'children' =>Permission::where('slug', 'like', 'facility.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'آگهی ها',
                    'children' =>Permission::where('slug', 'like', 'estate.%')->pluck('title', 'id')
                ],
                [
                    'persianName' => 'تنظیمات',
                    'children' =>Permission::where('slug', 'like', 'setting.%')->pluck('title', 'id')
                ]
            ]
        ]);
    }


    /**
     * Show the profile for a given user.
     *
     * @param  Role $role
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        return response()->json([
            'data' => new RoleResource($role)
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return response()->json([
            'message' => 'نقش با موفقیت آپدیت شد.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'message' => 'نقش با موفقیت حذف شد.'
        ], 200);
    }
}
