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
     * @var string
     * @JMS\Type("string")
     */
    private $schema;

    public function __construct(string $id, string $title, string $description, string $schema = 'http://json-schema.org/draft-07/schema#')
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->schema = $schema;
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
