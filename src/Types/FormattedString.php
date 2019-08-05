<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

use JMS\Serializer\Annotation as JMS;

abstract class FormattedString extends JsonSchemaType
{
    /**
     * @JMS\Type("string")
     */
    protected $format;

    public function __construct(string $name, string $description, string $format)
    {
        parent::__construct($name, $description, 'string');
        $this->format = $format;
        $this->_jst = $format;
    }

    public function getFormat(): string
    {
        return $this->format;
    }
}
