<?php

/*
🛠 Common Artisan Commands
Command	                                    Purpose
php artisan serve	                        Starts the local development server
php artisan make:controller PageController	Creates a new controller
php artisan make:model Post -m	            Creates a model and a migration
php artisan migrate	                        Runs all database migrations
php artisan route:list	                    Shows all registered routes
php artisan help	                        Lists all available commands
*/

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome'); // means show welcome.blade.php if someone visits http://localhost:8000/ 
});

Route::get('/', function () {
    return "<h1>Hello laravel<h1>
        <a href='/about'>About</a>
    ";
});

Route::get('/about', [App\Http\Controllers\PageController::class, 'about']); // php artisan make:controller PageController
/*
it tells Laravel:

“When a GET request is made to /about, run the about method inside the PageController class.”

*/
/*
When visit /about:

Laravel looks (here) in routes/web.php.

Finds this line.

Sees that the request is GET and the URL matches /about.

It creates an instance of PageController and calls the about() method.

Whatever the method returns (typically a view), gets shown in the browser.
*/

