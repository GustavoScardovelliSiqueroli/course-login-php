<?php


namespace configs;

class ViewConfigs
{
    public static function render(string $htmlName, array $vars = [], string $templatePath = '\static\templates\\')
    {
        $filePath  = (string) __DIR__ . '\..\..' . $templatePath . $htmlName . '.html';
        $file = file_get_contents($filePath);

        $keys = array_keys($vars);
        $keys = array_map(function ($items) {
            return "{{ " .  $items . " }}";
        }, $keys);

        return str_replace($keys, array_values($vars), $file);
    }
}
