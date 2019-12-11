<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

class TypeTime extends FormattedString
{
    public function __construct(string $name, string $description)
    {
        $this->type = 'string';
        parent::__construct($name, $description, 'time');
    }
}
