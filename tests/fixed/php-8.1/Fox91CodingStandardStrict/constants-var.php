<?php
declare(strict_types=1);

namespace ConstantsVar;

// phpcs:disable PSR1.Classes.ClassDeclaration.MultipleClasses, Squiz.Classes.ClassFileName.NoMatch

const FOO = 123;

const BAR_1 = 1;
const BAR_1 = 2;

final class Bar
{
    public const BAZ = 456;

    protected const PROPERTY_1 = '1';
    protected const PROPERTY_2 = '2';
}

final class Spacing
{
    public const FOO = 'bar';
    public const BAR = 'bar';

    public const BAZ = 'baz';

    /** Brevis, primus coordinataes foris promissio de varius, barbatus heuretes. */
    private const BAM = 1234;
}
