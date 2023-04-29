<?php

include_once __DIR__.'/Route.php';

Route::add("/dashboard", "AppController@indexAction");
Route::add("/addStudent", "StudentController@createStudentAction");
Route::add("/create", "StudentController@createStudentAction");
Route::add("/studentLists", "StudentController@getStudentsAction");
Route::add("/viewStudent", "StudentController@getStudentAction");
Route::add("/delete", "StudentController@deleteStudentAction");
Route::add("/editStudent", "StudentController@updateStudentAction");
Route::add("/update", "StudentController@updateStudentAction");
Route::add("/report", "StudentController@getSummaryAction");

$route = Route::run();
