<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $missionId
 * @property int $userId
 * @property int $actionId
 * @property string $created_at
 * @property string $updated_at
 */
class Activity extends Model
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
    protected $fillable = ['missionId', 'userId', 'actionId', 'created_at', 'updated_at'];

    public function mission(){
        return $this->belongsTo(Mission::class, 'missionId');
    }

    public function action(){
        return $this->belongsTo(Action::class, 'actionId')->with('platform');
    }
}
