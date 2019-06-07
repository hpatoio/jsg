<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

final class TypeObject extends JsonSchemaType
{
    private $schema;
    private $id;
    private $title;

    private $properties;

    private $required;

    public function __construct(string $name, string $schema, string $id, string $title)
    {
        $this->schema = $schema;
        $this->id = $id;
        $this->title = $title;
        $this->type = 'object';

        $this->properties = array();
        $this->required = array();
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function getRequired(): array
    {
        return $this->required;
    }

    public function addProperty(JsonSchemaType $property, bool $required = false)
    {
        if (isset($this->properties[$property->getName()])) {
            throw new \InvalidArgumentException('Property '.$property->getName().' already present.');
        }

        $this->properties[$property->getName()] = $property;

        if ($required) {
            $this->required[] = $property->getName();
        }
    }
}
