<?php
/**
 * Created by PhpStorm.
 * User: Reza
 * Date: 1/24/2022
 * Time: 2:55 PM
 */

namespace App\Helpers;


trait FailedPolicy
{
    protected function failed_policy()
    {
        abort(response()->json([
            'messge' => 'شما اجازه دسترسی به این بخش را ندارید'
        ], 403));
    }
}