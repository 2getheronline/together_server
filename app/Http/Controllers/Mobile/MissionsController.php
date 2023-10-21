<?php

namespace App\Http\Controllers\Mobile;

use App\Language;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Lang;
use JoeDixon\Translation\Translation;

class MissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * @var Collection $missions
         */
        $missions = Mission::where('status', config('constants.status.active'))
                ->where(function($q) {
                    $q->whereHas('groups', function ($q) {
                        $q->whereIn('groupId', Auth::user()->groupsAncestors);
                    })->orWhereDoesntHave('groups');
                })
                ->whereNotIn('id', Auth::user()->activities->pluck('missionId'))
                ->with(['actions', 'tags', 'groups', 'platform'])
                ->get();     

        return $missions->reject(function(Mission $mission) {
            return ! Lang::has("missions.".$mission->id."_title", Auth::user()->language, false);
        })->values();
    }
}
