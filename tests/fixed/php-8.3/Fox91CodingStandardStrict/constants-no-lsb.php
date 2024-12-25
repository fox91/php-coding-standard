<?php
declare(strict_types=1);

namespace Test;

final class ConstantLsb
{
    public const A = 123;

    public function __construct()
    {
        echo self::A;
    }
}
