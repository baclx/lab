<?php

// use = import
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\CheckSuperAdminMiddleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

//Route::get('/{ten}', function ($ten) {
//    echo "welcome to laravel - $ten" ;
//});

//Route::get('/{ten}', [WelcomeController::class, 'welcome']);

//Route::get('/', [WelcomeController::class, 'form']);
//Route::post('/post', [WelcomeController::class, 'post']);

//Route::get('/', [StudentController::class, 'index']);
//Route::get('/create', [StudentController::class, 'create'])->name('create');
//Route::post('/create', [StudentController::class, 'store'])->name('store');

// thay cho cách bên dưới :v
//Route::resource('courses', CourseController::class);
//
//Route::resource('students', StudentController::class);

//Route::group(['prefix' => 'students', 'as' => 'students.'], function() {
//    Route::get('/', [StudentController::class, 'index'])->name('index');
//    Route::get('/create', [StudentController::class, 'create'])->name('create');
//    Route::post('/create', [StudentController::class, 'store'])->name('store');
//    Route::get('/edit/{course}', [StudentController::class, 'edit'])->name('edit');
//    Route::put('/edit/{course}', [StudentController::class, 'update'])->name('update');
//    Route::delete('/destroy/{course}', [StudentController::class, 'destroy'])->name('destroy');
//});

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'processLogin'])->name('process_login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'processRegister'])->name('process_register');


Route::group([
    'middleware' => 'admin',
], function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    // admin k use dc destroy
    Route::resource('courses', CourseController::class)->except('destroy');
    Route::resource('students', StudentController::class)->except('destroy');
    Route::get('layout', function() {
        return view('layout.master');
    });

    // super admin
    Route::group([
        'middleware' => checkSuperAdminMiddleware::class,
    ], function() {
        Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    });
});

// todoList
Route::resource('todos', TodoController::class);
