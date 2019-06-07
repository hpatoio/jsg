<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

abstract class JsonSchemaType
{
    protected $type;
    protected $description;

    public function getType(): string
    {
        return $this->type;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
