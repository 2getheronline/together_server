<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $icon
 * @property int $platform_id
 * @property string $created_at
 * @property string $updated_at
 */
class Action extends Model
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
    protected $fillable = ['name', 'icon', 'platformId', 'created_at', 'updated_at'];


    protected $casts = [
        'id' => 'integer',
    ];

    public function platform(){
        return $this->belongsTo(Platform::class, 'platformId');
    }
}
