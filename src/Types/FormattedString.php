<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

abstract class FormattedString extends JsonSchemaType
{
    protected $format;

    public function __construct(string $name, string $description, string $format)
    {
        parent::__construct($name, $description, 'string');
        $this->format = $format;
    }

    public function getFormat(): string
    {
        return $this->format;
    }
}
