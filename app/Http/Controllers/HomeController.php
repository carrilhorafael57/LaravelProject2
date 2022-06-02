<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

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
        // $latestPosts = Post::latest()->get();
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })
            ->latest()
            ->get();



        return view('index', [
            'categories' => $allCategories,
            'posts' => $posts
        ]);
    }
}
