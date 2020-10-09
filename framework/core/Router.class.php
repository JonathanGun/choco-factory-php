<?php

class Router
{
    public static function parse($url, $request)
    {
        $url = trim($url);
        $explode_url = explode('/', $url);
        $explode_url = array_slice($explode_url, 1);

        if (empty($explode_url[0])) {
            $request->controller = "Index";
            $request->action = "index";
            $request->params = [];
        } else {
            $request->controller = ucfirst($explode_url[0]);
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }
    }
}
