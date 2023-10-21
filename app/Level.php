<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $minPoints
 * @property int $maxPoints
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 */
class Level extends Model
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
    protected $fillable = ['name', 'minPoints', 'maxPoints', 'icon', 'created_at', 'updated_at'];

}
