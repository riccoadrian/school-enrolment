<?php

if (isset($_GET['action'])) {
    $request = $_GET['action'];

    if ($request == 'dashboard') {
        $route = "AppController@indexAction";
    }

    if ($request == 'addStudent') {
        $route = "StudentController@createStudentAction";
    }

    if ($request == 'create') {
        $route = "StudentController@createStudentAction";
    }

    if ($request == 'studentLists') {
        $route = "StudentController@getStudentsAction";
    }

    if ($request == 'viewStudent') {
        $route = "StudentController@getStudentAction";
    }
}
