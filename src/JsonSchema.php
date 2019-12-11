<?php

namespace Hpatoio\JsonSchema;

use Hpatoio\JsonSchema\Traits\PropertiesAwareTrait;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessorOrder("custom", custom = {"schema", "id", "title", "description", "title", "properties", "required"})
 */
class JsonSchema
{
    use PropertiesAwareTrait;

    /**
     * @JMS\Type("string")
     */
    private $schema;

    /**
     * @JMS\Type("string")
     */
    private $id;

    /**
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @JMS\Type("string")
     */
    private $description;

    public function __construct(string $id, string $title, string $description, string $schema = 'http://json-schema.org/draft-07/schema#')
    {
        $this->id = $id;
        $this->title = $title;
        $this->schema = $schema;
        $this->description = $description;
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
}
