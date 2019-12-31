<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

use Hpatoio\JsonSchema\Types\Property\ObjectProperty;
use JMS\Serializer\Annotation as JMS;

final class TypeObject extends JsonSchemaType
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
     * @JMS\Type("array<string>")
     */
    protected $required = [];

    public function __construct(string $name, string $description, ObjectProperty ...$objectProperties)
    {
        parent::__construct($name, $description, 'object');

        if (0 === count($objectProperties)) {
            throw new \InvalidArgumentException('Object '.$name.' cannot be created without properties');
        }

        foreach ($objectProperties as $objectProperty) {
            if (isset($this->properties[$objectProperty->getName()])) {
                throw new \InvalidArgumentException('Property '.$objectProperty->getName().' already present for the object '.$name);
            }

            $this->properties[$objectProperty->getName()] = $objectProperty->getProperty();

            if ($objectProperty->isRequired()) {
                $this->required[] = $objectProperty->getName();
            }
        }
    }

    /** @return array<JsonSchemaType> */
    public function getProperties(): array
    {
        return $this->properties;
    }

    public function hasRequiredProperties(): bool
    {
        return 0 !== count($this->required);
    }

    /** @return array<string> */
    public function getRequiredProperties(): array
    {
        return $this->required;
    }
}
