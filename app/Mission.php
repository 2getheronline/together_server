<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

/**
 * @property integer $id
 * @property string $body
 * @property int $current
 * @property string $publish_date
 * @property string $deadline_date
 * @property boolean $happy
 * @property string $image
 * @property int $level
 * @property int $points
 * @property string $proposedComments
 * @property int $limit
 * @property int $status
 * @property string $subtitle
 * @property string $target
 * @property string $title
 * @property string $url
 * @property string $version
 * @property string $created_at
 * @property string $updated_at
 */
class Mission extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'publishDate', 'deadlineDate', 'happy', 'image', 'screenshot', 'level', 'points', 'proposedComments', 'platformId', 'limit', 'status', 'target', 'url', 'version', 'created_at', 'updated_at'];

    protected $appends = [
        'current',
        'title',
        'body'
    ];

    public static $snakeAttributes = false;

    protected $casts = [
        'proposedComments' => 'array',
        'points' => 'integer',
        'happy' => 'boolean',
        'level' => 'integer',
        'limit' => 'integer',
        'status' => 'integer'
    ];

    public function platform(){
        return $this->belongsTo(Platform::class, 'platformId');
    }

    public function actions(){
        return $this->belongsToMany(Action::class, 'missions_actions', 'missionId', 'actionId');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'missions_tags', 'missionId', 'tagId');
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'group_missions', 'missionId', 'groupId');
    }

    public function activites(){
        return $this->hasMany(Activity::class, 'missionId');
    }

    public function completedActions(){
        return $this->hasMany(Activity::class, 'missionId')
                    ->where('userId', Auth::id());
    }

    public function loadActionIds(){
        $this->attributes['actions'] = $this->actions()->pluck('actionId')
            ->map(function($x){return $x + 0;});//Convert to int
        return $this;
    }

    public function loadTagIds(){
        $this->attributes['tags'] = $this->tags()->pluck('tagId')
            ->map(function($x){return $x + 0;}); //Convert to int
        return $this;
    }

    public function loadGroupIds(){
        $this->attributes['groups'] = $this->groups()->pluck('groupId')
            ->map(function($x){return $x + 0;});//Convert to int

        return $this;
    }

    public function loadDetails(){
        $langs = Language::all();
        $this->attributes['details'] = [];

        foreach ($langs as $l){
            $this->attributes['details'][$l->language] = $l->translations()
                ->where('group', 'missions')
                ->where('key', 'like', $this->attributes["id"] . '%')
                ->pluck('value', 'key')
                ->mapWithKeys(function ($item, $key) {
                    return [ Str::of($key)->split('/_/')[1] => $item];
                });
        }

        return $this;
    }

    public function getTitleAttribute(){
        return trans('missions.' . ($this->attributes["id"] ?? ''). '_title');
    }

    public function getBodyAttribute(){
        return  __('missions.' . ($this->attributes["id"] ?? '') . '_body');
    }

    public function getCurrentAttribute(){
        return $this->activites()->distinct('userId')->count();
    }
}
