<?php

namespace SpeedWeb\core;

class Route
{

    public static function run(string $url, $callback, string $method = "get"): void
    {
        $method = explode("|", strtoupper($method));
        if(in_array($_SERVER["REQUEST_METHOD"], $method)){
            $patterns = [
                '{url}' => '([0-9a-zA-Z-_/]+)',
                '{id}' => '([0-9]+)'
            ];
            $url = str_replace(array_keys($patterns), array_values($patterns), $url);
            $request_uri = $_SERVER["REQUEST_URI"];
            $explode = explode("/", $request_uri);
            if(preg_match('@^' . $url . '$@', $request_uri, $parameters)){
                unset($parameters[0]);
                if(is_callable($callback)){
                    call_user_func_array($callback, $parameters);
                }
                [$controllerName, $methodName] = explode('@', $callback);
                $controllerName = '\SpeedWeb\controllers\\' . $controllerName;
                $controller = new $controllerName();
                call_user_func_array([$controllerName, $methodName], $parameters);
            }
        }
    }
}