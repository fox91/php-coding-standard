<?php
declare(strict_types=1);

namespace Example;

use Fancy\TestCase;

use function strlen as stringLength;

use const PHP_RELEASE_VERSION as PHP_PATCH_VERSION;

final class ParentClass
{
}

/**
 * Description
 *
 * @author Invalid
 * @since 0.1
 */
final class Example extends ParentClass implements \IteratorAggregate
{
    private const VERSION = \PHP_VERSION - (PHP_MINOR_VERSION * 100) - PHP_PATCH_VERSION;

    /** @var int|null */
    private $foo;

    /** @var array<string> */
    private $bar;

    /** @var bool */
    private $baz;

    public function __construct(?int $foo = null, array $bar = [], bool $baz = false, private $baxBax = 'unused')
    {
        $this->foo = $foo;
        $this->bar = $bar;
        $this->baz = $baz;

        parent::__construct();
    }

    /**
     * Description
     */
    public function getFoo(): ?int
    {
        return $this->foo;
    }

    /** @return iterable */
    public function getIterator(): array
    {
        assert($this->bar !== null);
        return new \ArrayIterator($this->bar);
    }

    public function isBaz(): bool
    {
        [$foo, $bar, $baz] = $this->bar;

        return $this->baz;
    }

    /** @throws InvalidArgumentException if this example cannot baz. */
    public function mangleBar(int $length): void
    {
        if (!$this->baz) {
            throw new \InvalidArgumentException();
        }

        $this->bar = (string) $this->baxBax ?? \substr($this->bar, stringLength($this->bar - $length));
    }

    public static function getMinorVersion(): int
    {
        return self::VERSION;
    }

    public static function getTestCase(): TestCase
    {
        return new TestCase();
    }
}
