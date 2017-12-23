<?php

function checkActiveRoute($route, $className = 'active'): string
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