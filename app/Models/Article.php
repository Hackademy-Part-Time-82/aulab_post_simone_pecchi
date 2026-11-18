<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Str;

class Article extends Model
{

    use HasFactory, Searchable;

    protected $fillable =
    [
        'title',
        'slug',
        'subtitle',
        'body',
        'image',
        'category_id',
        'user_id',
        'is_accepted',
    ];
    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body,
            'category' => $this->category?->name,
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function readDuration()
    {
        $totalWords = Str::wordCount($this->body);
        $minutesToRead = ceil($totalWords / 200);

        return max(1, intval($minutesToRead));
    }
}
