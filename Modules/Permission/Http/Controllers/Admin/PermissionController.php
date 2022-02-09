<?php

namespace Modules\Permission\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Entities\Permission;
use Modules\Permission\Transformers\PermissionCollection;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $facilities = Permission::orderBy('created_at', 'desc')->get();
        return response()->json(new PermissionCollection($facilities), 200);
    }
}
