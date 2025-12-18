<?php
declare(strict_types=1);

function content(): array {
    static $data = null;
    if ($data !== null) return $data;

    $path = __DIR__ . '/../content/site.json';
    if (!file_exists($path)) {
        throw new Exception("Content file not found: $path");
    }

    $json = file_get_contents($path);
    $data = json_decode($json, true);

    if (!is_array($data)) {
        throw new Exception("Invalid JSON in content/site.json");
    }

    return $data;
}

function e(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function rupiah(int $n): string {
    return 'Rp ' . number_format($n, 0, ',', '.');
}
