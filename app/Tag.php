<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $parent
 * @property string $created_at
 * @property string $updated_at
 */
class Tag extends Model
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
    protected $fillable = ['name', 'parent', 'created_at', 'updated_at'];
    
    protected $casts = [
        'id' => 'integer',
    ];
}
