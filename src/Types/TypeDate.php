<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

class TypeDate extends FormattedString
{
    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'date');
    }
}
