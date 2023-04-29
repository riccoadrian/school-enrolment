<?php

$routeList = [];

class Route {
    public static function add($routeName, $controllerAction)
    {
        $GLOBALS['routeList'][] = ['name' => $routeName, 'action' => $controllerAction];
    }

    public static function run()
    {
        $request = $_SERVER['REQUEST_URI'];
        $request_route = explode('?', $request)[0];

        foreach ($GLOBALS['routeList'] as $route) {
            if ($request_route == $route['name']) {
                return $route['action'];
            }
        }
    }
}
