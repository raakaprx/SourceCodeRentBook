<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use Sluggable;
    use HasFactory;
    use SoftDeletes;
    

    protected $fillable = [
        'name','slug'
    ] ;

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];

    }

    
}
