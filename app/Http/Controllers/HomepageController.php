<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;


class HomepageController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $title = "Homepage";

        return view('web.homepage', [
            'title' => $title,
            'categories' => $categories
        ]);
        
    }
    
        public function product()
        {
            $title = "Product";
            return view('web.products', [
                'title' => $title
            ]);
            
        }
    
    
}
