<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 * @property string $avatar
 * @property string $birthdate
 * @property int $level
 * @property int $points
 * @property string $provider
 * @property string $uid
 * @property string $api_key
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
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
    protected $fillable = ['name', 'email', 'avatar', 'birthdate', 'points', 'provider', 'groupId', 'language', 'created_at', 'updated_at'];

    protected $hidden = ['apiKey'];

    protected $appends = [
        'address',
        'level'
    ];

    protected $casts = [
        'points' => 'integer',
        'type' => 'integer',
        'status' => 'integer'
    ];

    public function messages(){
        return $this->hasMany(Message::class, 'author');
    }

    public function activities(){
        return $this->hasMany(Activity::class, 'userId');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'userId');
    }

    public function getGroupsAncestorsAttribute(){
        $g = Group::find($this->attributes['groupId']);
        if (!$g) return [];

        $groups = collect($g->id);

        while($g->parent != null){
            $groups->push($g->parent);
            $g = $g->parentGroup;
        }

        return $groups;
    }

    public function getLevelAttribute(){
        return Level::where('minPoints', '<=', $this->attributes['points'] ?? 0)
                    ->where('maxPoints', '>=', $this->attributes['points'] ?? 0)
                    ->first();
    }

    // public function getNameAttribute(){
    //     return $this->attributes['firstName'] . ' ' . $this->attributes['lastName'] ?? '';
    // }

    public function getAddressAttribute(){
        return ($this->attributes['city'] ?? '') . ', ' . ($this->attributes['country'] ?? '');
    }

    public function isAdmin(){
        return $this->type >= config('constants.userTypes.admin');
    }
}
