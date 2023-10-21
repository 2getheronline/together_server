<?php

namespace App\Http\Controllers\Admin;

use App\Language;
use App\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Translation as AppTranslation;
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
        $q = Mission::query();

        if (isset($request->tag)) {
            $q->whereHas('tags', function ($q) use ($request) {
                $q->where('tagId', $request->tag);
            });
        }

        if (isset($request->group)) {
            $q->whereHas('groups', function ($q) use ($request) {
                $q->where('groupId', $request->group);
            });
        }

        if (isset($request->status) && $request->status != 0) {
            $q->where('status', $request->status);
        }

        if (isset($request->q)) {


            $q->where(function ($q) use ($request) {

                $translates = AppTranslation::where("group", "missions")
                    ->where("value", 'like', '%' . $request->q . '%')
                    ->get();

                foreach ($translates as $t) {
                    $q->orWhere('id', explode("_",$t->key)[0]);
                }
                $q->orWhere('id', "");
            });
        }

        return $q->orderBy('updated_at', 'desc')
            ->with(['actions', 'tags', 'groups', 'platform'])->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mission = new Mission();
        $mission->fill($request->all());
        $mission->save();

        $this->saveItems($request, $mission);

        return $mission;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        return $mission->loadActionIds()
            ->loadTagIds()
            ->loadGroupIds()
            ->loadDetails();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $mission->fill($request->all());
        $mission->save();

        $this->saveItems($request, $mission);

        return $mission;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        //
    }

    private function saveItems(Request $request, Mission $mission)
    {

        $request->tags ? $mission->tags()->sync($request->tags) : '';
        $mission->groups()->sync($request->groups ? $request->groups : []);
        //$request->groups ? $mission->groups()->sync($request->groups) : '';
        $request->actions ? $mission->actions()->sync($request->actions) : '';

        if (\is_array($request->details)) {
            foreach ($request->details as $lang => $trans) {

                foreach ($trans as $k => $v) {
                    Translation::create([
                        "language_id" => Language::where('language', $lang)->first()->id,
                        "group" => 'missions',
                        "key" => $mission->id . '_' . $k,
                        "value" => $v,
                    ]);
                }
            }
        }
    }
}
