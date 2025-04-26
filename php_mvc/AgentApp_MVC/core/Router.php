<?php

class Router {
    private array $routes = [];
    private array $dependencies;

    public function __construct(array $dependencies = []) {
        $this->dependencies = $dependencies;
    }

    public function get(string $uri, array $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $uri, string $method) {
        $uri = trim($uri, '/');

        if (isset($this->routes[$method][$uri])) {
            [$controller, $methodName] = $this->routes[$method][$uri];

            if (!class_exists($controller)) {
                throw new Exception("Controller $controller not found");
            }

            $instance = new $controller(...$this->dependencies); // ✅ FIX: pass dependencies

            if (!method_exists($instance, $methodName)) {
                throw new Exception("Method $methodName not found in $controller");
            }

            return $instance->$methodName();
        }

        http_response_code(404);
        echo "🚨 404 - Page not found: <strong>$uri</strong>";
    }
}
