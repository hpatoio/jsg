<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

use JMS\Serializer\Annotation as JMS;

class TypeString extends JsonSchemaType
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $minLength;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    private $maxLength;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $pattern;

    // Taken from https://github.com/opis/json-schema/blob/19868514d5e4c27553b21c7f0cf6388734c67d18/src/Validator.php
    const BELL = "\x07";

    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'string');
    }

    public function setMinLength(int $minLength): void
    {
        if ($minLength < 0) {
            throw new \InvalidArgumentException('Min length must be higher that zero');
        }

        if (null !== $this->maxLength && $minLength > $this->maxLength) {
            throw new \InvalidArgumentException('Min length higher that max length');
        }

        $this->minLength = $minLength;
    }

    public function setMaxLength(int $maxLength): void
    {
        if ($maxLength < 1) {
            throw new \InvalidArgumentException('Max length must be higher that one');
        }

        if (null !== $this->minLength && $maxLength < $this->minLength) {
            throw new \InvalidArgumentException('Max length lower that min length');
        }

        $this->maxLength = $maxLength;
    }

    public function setPattern(string $pattern): void
    {
        // Taken from https://github.com/opis/json-schema/blob/19868514d5e4c27553b21c7f0cf6388734c67d18/src/Validator.php

        $match = @preg_match(self::BELL.$pattern.self::BELL.'u', 'dummy_data');

        if (false === $match) {
            throw new \InvalidArgumentException('Pattern '.$pattern.' is not a valid regex');
        }

        $this->pattern = $pattern;
    }
}
