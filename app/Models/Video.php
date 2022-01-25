<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Video extends Model
{
    use HasFactory;

    //fields that allowed to insert
    protected $fillable = [
        'name', 'url', 'thumbnail', 'slug', 'length', 'description', 'category_id'
    ];
    //fields that not allowed to insert
//    protected $guarded=[
//        'description'
//    ];

//    Override
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function getLengthForHumanAttribute()
    {
        $out = gmdate('i:s', $this->length);
        if ($this->length > 3600)
            $out = gmdate('H:i:s', $this->length);

        return $out;
    }

    public function getCreatedAtAttribute($value)
    {
        $verta = new Verta($value);
        return $verta->formatDifference();
    }

    public function relatedVideos(int $count = 6)
    {
        return Video::all()->random($count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }
}
