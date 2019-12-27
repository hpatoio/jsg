<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types\Property;

use Hpatoio\JsonSchema\Types\JsonSchemaType;

abstract class ObjectProperty
{
    /** @var JsonSchemaType */
    private $property;

    public function __construct(JsonSchemaType $property)
    {
        $this->property = $property;
    }

    public function getName(): string
    {
        return $this->property->getName();
    }

    public function getProperty(): JsonSchemaType
    {
        return $this->property;
    }

    abstract public function isRequired(): bool;
}
