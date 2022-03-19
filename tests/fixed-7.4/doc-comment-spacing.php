<?php
declare(strict_types=1);

namespace Test;

use BarException;
use FooException;

class Test
{
    /**
     * Description
     */
    public function a(): void
    {
    }

    /**
     * Description
     * More Description
     * Even More Description
     */
    public function b(): void
    {
    }

    /**
     * First Paragraph Description
     *
     * Second Paragraph Description
     *
     * @param iterable<int> $foo
     *
     * @throws FooException
     */
    public function c(iterable $foo): void
    {
    }

    /**
     * Description
     * More Description
     *
     * @internal
     * @deprecated
     *
     * @link https://example.com
     * @see other
     * @uses other
     *
     * @ORM\Id
     * @ORM\Column
     * @ODM\Id
     * @ODM\Column
     * @PHPCR\Uuid
     * @PHPCR\Field
     *
     * @param iterable<int> $foo
     * @param iterable<int> $bar
     * @psalm-param array<string, int> $foo
     * @phpstan-param array<string, int> $foo
     *
     * @return iterable<int>
     * @psalm-return array<string, int>
     * @phpstan-return array<string, int>
     *
     * @throws FooException
     * @throws BarException
     */
    public function d(iterable $foo, iterable $bar): iterable
    {
    }

    /** @param iterable<mixed> $singleAnnotation */
    public function e(iterable $singleAnnotation): void
    {
    }

    public function f(bool $s): ?int
    {
        if ($s) {
            return 44;
        }

        return null;
    }

    public function g(bool $s): ?int
    {
        if ($s) {
            return 44;
        }

        return null;
    }

    /**
     * @param iterable<mixed> $baz
     * @param int|float $foo
     * @param array<string> $bar
     *
     * @return iterable<int>
     */
    public function h($foo, array $bar, iterable $baz): iterable
    {
    }
}
