<?php

declare(strict_types=1);

function site_url(): string
{
    // Auto-detect base URL (works on XAMPP too)
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $uri = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/\\');

    return $scheme.'://'.$host.($uri ? $uri : '');
}

function canonical_url(string $path = '/'): string
{
    $base = site_url();
    $path = '/'.ltrim($path, '/');

    return rtrim($base, '/').$path;
}
