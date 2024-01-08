<?php
namespace Core;
class Router
{
    public $router = [];
    public function post($uri , $callback)
    {
        $this->router['post'][$uri] = $callback;
    }
    public function get($uri , $callback)
    {
        $this->router['get'][$uri] = $callback;
    }
    public function dispatch($uri , $method)
    {
        if(array_key_exists($uri , $this->router[$method]))
        {
            $this->router[$method][$uri]();
        }else
        {
            echo "page not found ";
        }
    }
}