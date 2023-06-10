<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    /**relations many to one */
    public function user() {
        return $this->belongsTo( User::class );
    }

    public function category() {
        return $this->belongsTo( Category::class );
    }

    /**Relation many to many */
    public function tags() {
        return $this->belongsToMany( Tag::class );
    }

    /**Relation one to one polimorfica */
    public function image() {
        return $this->morphOne( Image::class, 'imageable');
    }

}
