<?php

namespace Modules\FrontEndLog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;


class FrontEndLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $error = $request->input('error');
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/frontendlog.log'),
        ])->info($error);
        return true;
    }
}
