<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() // method name is important, should be about!
    {
        return view('about', ['name' => "sefa"]); // This loads the Blade view file located at resources/views/about.blade.php (no .blade.php extension needed in the call).
        /*
        It allows you to send dynamic data to the HTML page — like user names, blog posts, or database records.

        You can pass multiple variables too:
        */
    }
}
