<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

abstract class JsonSchemaType
{
    protected $name;
    protected $description;
    protected $type;

    public function __construct(string $name, string $description, string $type)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
