<?php

namespace Hpatoio\JsonSchema\Traits;

use Hpatoio\JsonSchema\Types\JsonSchemaType;
use JMS\Serializer\Annotation as JMS;

trait PropertiesAwareTrait
{
    /**
     * @var array<JsonSchemaType>
     * @JMS\SkipWhenEmpty()
     * @JMS\Type("array<string, Hpatoio\JsonSchema\Types\JsonSchemaType>")
     */
    protected $properties = [];

    /**
     * @var array<string>
     * @JMS\SkipWhenEmpty()
     * @JMS\Type("array")
     */
    protected $required = [];

    /**
     * @return array<JsonSchemaType>
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @return array<string>
     */
    public function getRequired(): array
    {
        return $this->required;
    }

    public function addProperty(JsonSchemaType $property, bool $required = false): void
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
