<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $language_id
 * @property string $group
 * @property string $key
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property Language $language
 */
class Translation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['language_id', 'group', 'key', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
