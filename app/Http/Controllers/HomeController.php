<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //method 1 (hard coded)
        // $allCategories = ['Category 1', 'Category 2'];

        //method 2 (facade class)
        // $allCategories = DB::table('categories')->get();

        //method 3 create model
        $allCategories = Category::all();


        return view('index', ['categories' => $allCategories]);
    }
}
