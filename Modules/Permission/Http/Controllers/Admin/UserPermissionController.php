<?php

namespace Modules\Permission\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function get()
    {
        return [
            'estate' => [
                'index' => true,
                'create' => false,
                'update' => true,
            ]
        ];
    }
}
