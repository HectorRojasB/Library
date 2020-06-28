<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        return Category::select('id','name as text')->get(); 
    }

}
