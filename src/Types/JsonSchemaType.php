<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(
 *      field = "_jst",
 *      map = {
 *          "boolean":  "Hpatoio\JsonSchema\Types\TypeBoolean",
 *          "date":  "Hpatoio\JsonSchema\Types\TypeDate",
 *          "date-time":  "Hpatoio\JsonSchema\Types\TypeDateTime",
 *          "email":  "Hpatoio\JsonSchema\Types\TypeEmail",
 *          "integer":  "Hpatoio\JsonSchema\Types\TypeInteger",
 *          "string":  "Hpatoio\JsonSchema\Types\TypeString",
 *          "time":  "Hpatoio\JsonSchema\Types\TypeTime",
 *          "object":  "Hpatoio\JsonSchema\Types\TypeObject"
 *      }
 * )
 * @JMS\AccessorOrder("custom", custom = {"_jst", "format", "name", "description", "type", "minimum", "maximum", "properties", "required"})
 */
abstract class JsonSchemaType
{
    /**
     * @var string
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    protected $description;

    /**
     * @var string
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string
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

    public function getName(): string
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
