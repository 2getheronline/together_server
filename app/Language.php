<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $language
 * @property string $created_at
 * @property string $updated_at
 * @property Translation[] $translations
 */
class Language extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'language', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany('App\Translation');
    }


    public function getRouteKeyName()
    {
        return 'language';
    }
}
