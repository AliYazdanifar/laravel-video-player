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
        'name', 'url', 'thumbnail', 'slug', 'length', 'description'
    ];
    //fields that not allowed to insert
//    protected $guarded=[
//        'description'
//    ];

    public function getLengthAttribute($value)
    {
        $out = gmdate('i:s', $value);
        if ($value > 3600) {
            $out = gmdate('H:i:s', $value);
        }
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
}
