<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = false;

    protected $fillable = ['name','description'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
