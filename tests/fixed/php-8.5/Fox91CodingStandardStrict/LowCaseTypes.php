<?php
declare(strict_types=1);

namespace Types;

final class LowCaseTypes
{
    public function stringToInt(String $string): int
    {
        return (int) $string;
    }

    public function returnString(): String
    {
        return 'foo';
    }
}
