<?php

declare(strict_types=1);
namespace Foo;
use DateInterval;
use function strrev;
use DateTimeImmutable;
use const DATE_RFC3339;
use DateTimeZone;
use function time;
strrev(
    (new DateTimeImmutable('@' . time(), new DateTimeZone('UTC')))
        ->sub(new DateInterval('P1D'))
        ->format(DATE_RFC3339)
);
