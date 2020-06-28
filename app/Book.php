<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = false;

    protected $fillable = ['name','author','published_date','user','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
