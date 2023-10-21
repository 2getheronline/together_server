<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Mission;

class ActivitiesController extends Controller
{
    public function index(Request $request){
        return Auth::user()->activities()
            ->orderBy('created_at', 'desc')
            ->get()->load(['mission.platform', 'action']);
    }

    public function store(Request $request){
        $mission = Mission::find($request->missionId);
        $user = Auth::user();

        foreach ($mission->actions as $action){
            Activity::create([
                'missionId' => $mission->id,
                'actionId' => $action->id,
                'userId' => $user->id
            ]);
        }

        $user->increment('points', $mission->points);

        if ($mission->current >= $mission->limit){
            $mission->status = config('constants.status.completed');
            $mission->save();
        }

        return ['status' => 'success'];
    }
}
