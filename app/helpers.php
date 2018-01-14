<?php

/**
 * Check provided route name with current active route
 *
 * @param $route
 * @param string $className
 * @return string
 */
function checkActiveRoute($route, string $className = 'active'): string
{
    $currentRoute = Route::currentRouteName();

    if (gettype($route) === 'array') {
        $isActiveRoute = false;

        array_map(function ($item) use ($currentRoute, &$isActiveRoute) {
            if ($currentRoute === $item) $isActiveRoute = true;
        }, $route);

        return $isActiveRoute ? $className : '';
    }

    return $currentRoute === $route ? $className : '';
}

/**
 * Trim provided string to provided length and add '..' if string was trimmed
 *
 * @param string $string
 * @param int $maxLength
 * @return string
 */
function trimString(string $string, $maxLength = 200): string
{
    return strlen($string) > $maxLength ?
        substr($string, 0, $maxLength) . '..' :
        $string;
}