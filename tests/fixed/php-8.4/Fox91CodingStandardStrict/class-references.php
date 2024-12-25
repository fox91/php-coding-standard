<?php
declare(strict_types=1);

final class Foo
{
}

final class Bar extends Foo
{
    /** @return iterable<string> */
    public function names(): iterable
    {
        yield self::class;
        yield self::class;
        yield self::class;
        yield get_class(new stdClass());
        yield parent::class;
        yield self::class;
    }
}
