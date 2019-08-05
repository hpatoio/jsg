<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(
 *      field = "_jst",
 *      map = {
 *          "boolean":  "Musement\JsonSchema\Types\TypeBoolean",
 *          "date":  "Musement\JsonSchema\Types\TypeDate",
 *          "date-time":  "Musement\JsonSchema\Types\TypeDateTime",
 *          "email":  "Musement\JsonSchema\Types\TypeEmail",
 *          "integer":  "Musement\JsonSchema\Types\TypeInteger",
 *          "string":  "Musement\JsonSchema\Types\TypeString",
 *          "time":  "Musement\JsonSchema\Types\TypeTime"
 *      }
 * )
 */
abstract class JsonSchemaType
{
    /**
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @JMS\Exclude()
     * @JMS\Type("string")
     */
    protected $_jst;

    public function __construct(string $name, string $description, string $type)
    {
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->_jst = $type;
    }

    public function getName(): ? string
    {
        return $this->name;
    }

    public function getDescription(): ? string
    {
        return $this->description;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
