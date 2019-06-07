<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

class TypeDateTime extends FormattedString
{
    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'date-time');
    }
}
