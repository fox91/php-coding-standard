<?php
declare(strict_types=1);

namespace TypeHints;

use Iterator;
use Traversable;

class TraversableTypeHints
{
    /** @var Traversable */
    private $parameter;

    public function get(Iterator $iterator): Traversable
    {
        return $this->parameter;
    }
}
