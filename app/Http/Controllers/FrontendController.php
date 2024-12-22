<?php

namespace App\Http\Controllers;

class FrontendController extends Controller
{
    public function posts()
    {
        dd('show all posts');

        return view('frontend.posts');
    }

    public function post($slug)
    {
        dd('show post', $slug);

        return view('frontend.post');
    }

    public function categories()
    {
        dd('show all categories');

        return view('frontend.categories');
    }

    public function category($id)
    {
        dd('show category', $id);

        return view('frontend.category');
    }

    public function page($slug)
    {
        dd('show page', $slug);

        return view('frontend.page');
    }
}
