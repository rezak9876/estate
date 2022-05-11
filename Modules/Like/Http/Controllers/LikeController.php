<?php

namespace Modules\Like\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Estate\Entities\Estate;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function change_like_status(Request $request)
    {
        $estate_id = $request->id;
        $estate = Estate::find($request->id);

        if ($request->status == 'unlike') {
            DB::table('likes')->where('estate_id', $estate_id)->where('user_id', Auth::id())->delete();
        } else {
            $estate->likes()->sync([Auth::id() => ['status' => $request->status]]);
        }

        return true;
    }
}
