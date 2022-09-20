<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ReviewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('bootcamps' , BootcampController::class);
Route::apiResource('courses' , CoursesController::class);
Route::apiResource('reviews', ReviewsController::class);

//Ruta especifica para crearle un curso a un bootcamp

Route::post("courses/{idbootcamp}/create",
            [CoursesController::class , "store"]
            );
            Route::apiResource('courses' , CoursesController::class);

Route::PUT("courses/{idbootcamp}/editar",
            [CoursesController::class, "update"]
        );
        Route::apiResource('courses', CoursesController::class);

Route::get("courses/{idbootcamp}/traer",
            [CoursesController::class, "show"]);

            


            
Route::get("reviews/{idbootcamp}/traer",
[ReviewsController::class, "show"]);


Route::PUT("reviews/{idbootcamp}/editar",
            [ReviewsController::class, "update"]
        );
Route::apiResource('reviews', ReviewsController::class);




