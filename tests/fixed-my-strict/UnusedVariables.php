<?php
declare(strict_types=1);

namespace Example;

class UnusedVariables
{
    public function unusedInheritedVariablePassedToClosure(): void
    {
        $foo = 'foo';

        $bar = static fn (): int => 1;
    }
}
