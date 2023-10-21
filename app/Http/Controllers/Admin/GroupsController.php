<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\User;
use App\Jobs\CreateGroup;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Group::all()->load('manager')->append('points');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$manager = User::create(["email" => $request->manager]);
        $group = Group::create([
            //"manager" => $manager->id,
            "name" => $request->name,
            "city" => $request->location,
            "password" => random_int(100000, 999999),
        ]);

        foreach ($request->mails as $mail) {
            $user = User::where("email",$mail)->first();

            if (!$user) {
                User::create([
                    "email" => $mail,
                    "groupId" => $group->id
                ]);
            }
        }

        // $manager->groupId = $group->id;
        // $manager->save();

        try {
            $this->dispatch(new CreateGroup($group, $request->message));
        } catch (\Throwable $t) {
        }

        return $group;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return $group->load(['manager', 'users']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        if ($request->members) {
            $users = User::whereIn("id", $request->members)->get();
            $group->users()->saveMany($users);
            return $group->load(['manager', 'users']);;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
