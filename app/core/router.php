<?php
namespace staditek\TugasAkhir\App\core;

class router
{
    private static $routes = array();
    private static $baseUrl = 'http://localhost:3000/public';

    public static function addRoute($method, $path, $controller, $function, $middleware = [])
    {
        self::$routes[] = array(
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middleware
        );
    }

    public static function url(string $path)
    {
        $baseUrl = self::$baseUrl ?? 'http://localhost:3000';
        return $baseUrl . $path;
    }

    public static function run()
    {
        $path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = '@^' . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route['path'])) . "$@D";
            if (preg_match_all($pattern, $path, $variables) && $method == $route['method']) {
                $function = $route['function'];
                $controller = new $route['controller'];

                foreach ($route['middleware'] as $middleware) {
                    $instance = new $middleware;
                    $instance->before();
                }

                if (is_object($controller) && method_exists($controller, $function)) {
                    $parameters = [];
                    unset($variables[0]);
                    foreach ($variables as $var) {
                        $parameters[] = array_shift($var);
                    }
                    call_user_func_array([$controller, $function], $parameters);
                } else {
                    http_response_code(404);
                    echo "not found";
                }
            }
        }
    }
}