<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mission;

class ActivitiesController extends Controller
{
    public function index(Request $request){
        return User::find($request->user)->activities()
            ->orderBy('created_at', 'desc')
            ->get()->load(['mission.platform', 'action']);
    }
}
