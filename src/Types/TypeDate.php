<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

class TypeDate extends FormattedString
{
    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'date');
    }
}
