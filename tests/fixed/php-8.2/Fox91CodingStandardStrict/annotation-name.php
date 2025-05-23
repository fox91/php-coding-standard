<?php
declare(strict_types=1);

interface Foo
{
    /**
     * This method does something
     */
    public function doSomething(array $options): void;

    /**
     * This method does not perform any action
     */
    public function nothing(): void;
}

final class Bar implements Foo
{
    /** @inheritDoc */
    public function doSomething(array $options): void
    {
    }

    /** {@inheritDoc} */
    public function nothing(): void
    {
    }
}
