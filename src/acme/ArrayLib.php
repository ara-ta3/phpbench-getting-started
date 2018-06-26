<?php

namespace Acme;

class ArrayLib
{
    public static function groupBy(array $items, string $keyName): array
    {
        $groups = [];
        foreach ($items as $item) {
            $key = $item[$keyName];
            if (array_key_exists($key, $groups)) {
                $groups[$key][] = $item;
            } else {
                $groups[$key] = [$item];
            }
        }
        return $groups;
    }
}
