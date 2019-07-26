<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

use Musement\JsonSchema\Traits\PropertiesAwareTrait;

final class TypeObject extends JsonSchemaType
{
    use PropertiesAwareTrait;

    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'object');

        $this->properties = array();
        $this->required = array();
    }
}
