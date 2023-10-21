<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property int $parent
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Group extends Model
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
    protected $fillable = ['name', 'description', 'manager', 'parent', 'city', 'country', 'password', 'image', 'created_at', 'updated_at'];

    protected $casts = [
        'id' => 'integer',
    ];

    protected $appends = [
        'membersCount',
        'address'
    ];


    public function manager(){
        return $this->belongsTo(User::class, 'manager');
    }

    public function users(){
        return $this->hasMany(User::class, 'groupId');
    }

    public function childs(){
        return $this->hasMany(Group::class, 'parent');
    }

    public function parentGroup(){
        return $this->belongsTo(Group::class, 'parent');

    }

    public function getMembersCountAttribute(){
        return $this->users()->count();
    }


    public function getPointsAttribute(){
        return $this->users()->sum('points');
    }

    public function getAddressAttribute(){
        return ($this->attributes['city'] ?? '') . ', ' . ($this->attributes['country'] ?? '');
    }
}
