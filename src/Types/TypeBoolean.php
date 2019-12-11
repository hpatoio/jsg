<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

class TypeBoolean extends JsonSchemaType
{
    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'boolean');
    }
}
