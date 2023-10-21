<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property int $author
 * @property int $parent
 * @property string $attachment
 * @property string $created_at
 * @property string $updated_at
 */
class Message extends Model
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
    protected $fillable = ['title', 'content', 'author', 'parent', 'link', 'attachment', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class, 'author');
    }

    public function parentMessage(){
        return $this->belongsTo(Message::class, 'parent');
    }

    public function childs(){
        return $this->hasMany(Message::class, 'parent');
    }
}
