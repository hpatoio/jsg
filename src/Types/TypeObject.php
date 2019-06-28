<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

final class TypeObject extends JsonSchemaType
{
    private $properties;

    private $required;

    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'object');

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

	public function getSchema(): string
	{
		return $this->schema;
	}

	public function getId(): string
	{
		return $this->id;
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
