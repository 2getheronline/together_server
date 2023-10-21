<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $logo
 * @property string $created_at
 * @property string $updated_at
 */
class Platform extends Model
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
    protected $fillable = ['name', 'logo', 'created_at', 'updated_at'];

    public function actions(){
        return $this->hasMany(Action::class, 'platformId');
    }

}
