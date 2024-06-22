<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, HasUuids, Sluggable;

    protected $fillable = ['images', 'body'] ;

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => ['post.title', 'id'],
                'firstUniqueSuffix'  => 2,
                'includeTrashed' => true,
            ]
        ];
    }
}
