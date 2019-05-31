<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

final class TypeObject extends JsonSchemaType
{
    private $schema;
    private $id;
    private $title;

    private $properties;

    public function __construct(string $schema, string $id, string $title)
    {
        $this->schema = $schema;
        $this->id = $id;
        $this->title = $title;
        $this->type = 'object';

        $this->properties = array();
    }

    public function getProperties(): array
    {
        return $this->properties;
    }
}
