<?php

class Router
{
    private $routes = [];
    private $baseUrl;
    private $currentUri;

    public function __construct($baseUrl = '')
    {
        $this->baseUrl = $baseUrl;
        $this->currentUri = $this->getRequestUri();
    }

    private function getRequestUri()
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        if (($pos = strpos($uri, '?')) !== false) {
            $uri = substr($uri, 0, $pos);
        }
        if (!empty($this->baseUrl) && strpos($uri, $this->baseUrl) === 0) {
            $uri = substr($uri, strlen($this->baseUrl));
        }
        if (empty($uri) || $uri[0] !== '/') {
            $uri = '/' . $uri;
        }
        return $uri;
    }

    public function add($method, $pattern, $handler, $name = null)
    {
        $method = strtoupper($method);

        // Parse handler (controller@action)
        if (is_string($handler)) {
            list($controller, $action) = explode('@', $handler);
        } elseif (is_array($handler) && count($handler) >= 2) {
            list($controller, $action) = $handler;
        } else {
            throw new \InvalidArgumentException('Invalid route handler specified');
        }

        // Find all {param} placeholders
        $paramNames = [];
        $patternRegex = $pattern;

        // If we find {something}, convert it to a regex group ([^/]+)
        if (preg_match_all('/\{([A-Za-z_][A-Za-z0-9_]*)\}/', $pattern, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $m) {
                $fullMatch = $m[0]; // e.g. {id}
                $paramName = $m[1]; // e.g. id

                $paramNames[] = $paramName;

                // Replace {id} with ([^/]+)
                $patternRegex = str_replace($fullMatch, '([^/]+)', $patternRegex);
            }
        }

        // Enclose the final pattern in regex start/end
        $patternRegex = '#^' . $patternRegex . '$#';

        // Store the route definition
        $route = [
            'method'     => $method,
            'pattern'    => $pattern,
            'regex'      => $patternRegex,
            'controller' => $controller,
            'action'     => $action,
            'paramNames' => $paramNames
        ];

        // Store either with a name or in a numeric array
        if ($name) {
            $this->routes[$name] = $route;
        } else {
            $this->routes[] = $route;
        }

        return $this;
    }

    // Shortcut methods for HTTP verbs
    public function get($pattern, $handler, $name = null)
    {
        return $this->add('GET', $pattern, $handler, $name);
    }

    public function post($pattern, $handler, $name = null)
    {
        return $this->add('POST', $pattern, $handler, $name);
    }

    public function put($pattern, $handler, $name = null)
    {
        return $this->add('PUT', $pattern, $handler, $name);
    }

    public function delete($pattern, $handler, $name = null)
    {
        return $this->add('DELETE', $pattern, $handler, $name);
    }

    // If you want a catch-all:
    /*
    public function any($pattern, $handler, $name = null)
    {
        return $this->add('ANY', $pattern, $handler, $name);
    }
    */

    public function generateUrl($name, $params = [])
    {
        if (!isset($this->routes[$name])) {
            throw new \Exception("Route with name '{$name}' not found");
        }

        $route = $this->routes[$name];
        $url   = $route['pattern'];

        // Replace {param} in the pattern with $params[$param]
        foreach ($params as $key => $value) {
            // We'll replace {key} with the param value
            $url = str_replace("{{$key}}", $value, $url);
        }

        // Check if we still have unreplaced parameters
        if (strpos($url, '{') !== false) {
            preg_match_all('/\{([^}]+)\}/', $url, $missing);
            if (!empty($missing[1])) {
                throw new \Exception(
                    "Missing required parameters: " . implode(', ', $missing[1])
                );
            }
        }

        return $this->baseUrl . $url;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        if ($method === 'POST' && isset($_POST['_method'])) {
            $method = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {
            // Skip if method doesn't match (unless we used ANY)
            if ($route['method'] !== $method && $route['method'] !== 'ANY') {
                continue;
            }

            // Check if we match the URI with this route's regex
            if (preg_match($route['regex'], $this->currentUri, $matches)) {
                array_shift($matches); // Remove the full match

                // Build an array of param => value
                $params = [];
                foreach ($route['paramNames'] as $index => $paramName) {
                    $params[$paramName] = $matches[$index] ?? null;
                }

                return $this->executeController(
                    $route['controller'],
                    $route['action'],
                    $params
                );
            }
        }

        // If no matching route is found, throw an exception or handle 404
        throw new \Exception('No matching route found');
    }

    private function executeController($controllerName, $actionName, $params = [])
    {
        if (!class_exists($controllerName)) {
            throw new \Exception("Controller '{$controllerName}' not found");
        }

        $controller = new $controllerName();
        if (!method_exists($controller, $actionName)) {
            throw new \Exception("Action '{$actionName}' not found in controller '{$controllerName}'");
        }

        return call_user_func_array([$controller, $actionName], $params);
    }
}