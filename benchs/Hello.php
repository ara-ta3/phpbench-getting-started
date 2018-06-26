<?php

use Acme\ArrayLib;
use PhpBench\Benchmark\Metadata\Annotations\Iterations;
use PhpBench\Benchmark\Metadata\Annotations\OutputTimeUnit;
use PhpBench\Benchmark\Metadata\Annotations\Revs;

/**
 *  @\PhpBench\Benchmark\Metadata\Annotations\BeforeMethods({"init"})
 *  @OutputTimeUnit("milliseconds", precision=3)
 */
class HelloBench
{
    private $target;

    public function init()
    {
        $this->target = [];
        foreach (range(1, 1000) as $x) {
            $this->target[] = self::newItem($x, $x + 1);
        }
    }

    /**
     * @Revs({1, 8, 64, 4096})
     * @Iterations(5)
     */
    public function benchHello()
    {
        ArrayLib::groupBy($this->target, 'key');
    }

    private static function newItem($k, $v): array {
        return [
            'key' => $k,
            'value' => $v,
        ];
    }
}
