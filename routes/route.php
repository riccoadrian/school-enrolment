<?php

if (isset($_GET['action'])) {
    $request = $_GET['action'];

    if ($request == 'dashboard') {
        $route = "AppController@indexAction";
    }
}
