<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 10/24/2021
 * Time: 6:25 PM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\View;
use Modules\Setting\Entities\Setting;

class BaseController extends Controller
{
    public function __construct()
    {
        //its just a dummy data object.
        $setting = Setting::first();

        // Sharing is caring
        View::share('setting', $setting);
    }
}