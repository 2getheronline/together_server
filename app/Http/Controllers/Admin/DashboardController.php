<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\Mission;
use App\User;
use App\Tag;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function overview(){
        return [
            'activeMissions' => Mission::where('status', config('constants.status.active'))->count(),

            'users' => User::count(),

            'groups' => Group::count(),

            'last_completed' => Mission::where('status', config('constants.status.completed'))
                                        ->orderBy('publishDate', 'desc')
                                        ->take(10)
                                        ->get(),

            'faileds' => Mission::where('status', config('constants.status.failed'))
                                        ->orderBy('publishDate', 'desc')
                                        ->take(10)
                                        ->get(),

            'missionSum' => DB::table('missions')->selectRaw('DATE_FORMAT(publishDate, "%Y") year,
                                     monthname(publishDate) month, count(*) as count,
                                     sum(case when status = 4 then 1 else 0 end) as completed,
                                     sum(case when status = 3 then 1 else 0 end) as failed'
                                     )
                                ->whereIn('status', [
                                    config('constants.status.failed'),
                                    config('constants.status.completed')])
                                ->groupby('year','month')
                                ->orderBy('year', 'desc')
                                ->orderBy('month', 'desc')
                                ->get(),

            'newUsers' => User::orderBy('created_at', 'desc')->take(50)->get(),

            'newMessages' =>  Message::with('user')->orderBy('created_at', 'desc')->take(50)->get(),
        ];
    }

    public function analytics(){
        return [
            'platforms' => DB::select('select platforms.name, count(distinct( missions.id)) as count from
                                missions
                                inner join platforms
                                    on platforms.id =  missions.platformId

                                group by platformId, platforms.name'),

            'topUsers' => User::orderBy('points', 'desc')->take(50)->get(),

            'topGroups' => DB::select('select groups.name, groups.image, groups.city, groups.country, sum(users.points) as points from
                                users inner join groups
                                    on groups.id =  users.groupId

                                group by groupId, groups.name, groups.city, groups.country, groups.image

                                order by points desc'),

            'types' => Mission::selectRaw('happy, status, count(*) as count')
                                    ->whereIn('status', [3,4])
                                    ->groupBy('happy')
                                    ->groupBy('status')->get()
        ];
    }
}
