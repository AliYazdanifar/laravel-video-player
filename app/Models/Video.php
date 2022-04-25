<?php

namespace App\Models;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->category->getrandomVideos($count)->except($this->id);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute()
    {
        return @$this->user->name;
    }
    public function getUserAvatarAttribute()
    {
        return @$this->user->avatar;
    }

}
