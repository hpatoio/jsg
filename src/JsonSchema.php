<?php

namespace Hpatoio\JsonSchema;

use Hpatoio\JsonSchema\Types\JsonSchemaType;
use Hpatoio\JsonSchema\Types\Property\ObjectProperty;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessorOrder("custom", custom = {"schema", "id", "title", "description","properties", "required"})
 */
class JsonSchema
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    private $schema;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $description;

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

    public function __construct(string $id, string $title, string $description, ObjectProperty ...$objectProperties)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->schema = 'http://json-schema.org/draft-07/schema#';

        if (0 === count($objectProperties)) {
            throw new \InvalidArgumentException('Json schema '.$id.' cannot be created without properties');
        }

        foreach ($objectProperties as $objectProperty) {
            if (isset($this->properties[$objectProperty->getName()])) {
                throw new \InvalidArgumentException('Property '.$objectProperty->getName().' already present for the json schema '.$id);
            }

            $this->properties[$objectProperty->getName()] = $objectProperty->getProperty();

            if ($objectProperty->isRequired()) {
                $this->required[] = $objectProperty->getName();
            }
        }
    }

    public function getSchema(): string
    {
        return $this->schema;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

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
}
