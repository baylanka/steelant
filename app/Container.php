<?php

namespace app;

class Container
{
    private $bindings = [];
    public function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key)
    {
        if(!array_key_exists($key,$this->bindings)){
            throw new \Exception('No binding exists for ' . $key);
        }

        return call_user_func($this->bindings[$key]);
    }
}