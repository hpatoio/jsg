<?php

namespace Musement\JsonSchema\Traits;

use Musement\JsonSchema\Types\JsonSchemaType;

trait PropertiesAwareTrait
{
	protected $properties = [];
	protected $required = [];

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