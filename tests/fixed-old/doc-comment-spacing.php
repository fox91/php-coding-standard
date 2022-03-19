<?php
declare(strict_types=1);

namespace Test;

class Test
{
    /**
     *
     * Description
     *
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
     * @throws FooException
     * @param iterable<int> $foo
     */
    public function c(iterable $foo): void
    {
    }

    /**
     *
     * Description
     * More Description
     * @throws FooException
     * @param iterable<int> $foo
     * @uses other
     * @throws BarException
     * @return iterable<int>
     * @ORM\Id
     * @internal
     * @link https://example.com
     * @ODM\Id
     * @deprecated
     * @PHPCR\Uuid
     * @param iterable<int> $bar
     * @PHPCR\Field
     * @ODM\Column
     * @ORM\Column
     * @psalm-param array<string, int> $foo
     * @phpstan-return array<string, int>
     * @phpstan-param array<string, int> $foo
     * @psalm-return array<string, int>
     * @see other
     *
     */
    public function d(iterable $foo, iterable $bar): iterable
    {
    }

    /** @param iterable<mixed> $singleAnnotation */
    public function e(iterable $singleAnnotation): void
    {
    }

    /***/
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
     * @return iterable<int>
     * @param array<string> $bar
     */
    public function h($foo, array $bar, iterable $baz): iterable
    {
    }
}
