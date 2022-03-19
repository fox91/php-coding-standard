<?php
declare(strict_types=1);

namespace Spacing;

final class PropertyTypeHintSpacing
{
    public bool $boolPropertyWithDefaultValue = false;

    public string $stringProperty;

    public int $intProperty;

    /** @var iterable<int>|null $nullableString*/
    public ?iterable $nullableString = null;

    public ? string $nullableString2 = null;
}
