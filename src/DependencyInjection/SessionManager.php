<?php



namespace App\DependencyInjection;

class SessionManager
{
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    
}
