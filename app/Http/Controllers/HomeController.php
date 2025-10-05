<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $categories = Category::mainCategories()
            ->select('name', 'slug', 'description', 'image', 'meta_title', 'meta_description')
            ->ordered()
            ->get();

        return inertia('Home', ['categories' => $categories]);
    }
}
