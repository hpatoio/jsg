<?php

namespace Musement\JsonSchema;

use Musement\JsonSchema\Traits\PropertiesAwareTrait;

class JsonSchema
{

	use PropertiesAwareTrait;

    private $schema;
    private $id;
    private $title;
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
