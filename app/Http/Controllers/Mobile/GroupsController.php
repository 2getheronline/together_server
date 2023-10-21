<?php

namespace App\Http\Controllers\Mobile;

use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupsController extends Controller
{
     public function index(Request $request)
    {
        return DB::select("select `groups`.`name`, sum(`users`.`points`) as `points` from `groups` join `users` on `users`.`groupId` = `groups`.`id` group by `groups`.`id` order by `points` desc");
    

    }
}
