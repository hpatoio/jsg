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

    private function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'string');
    }

    public static function withMinLength(string $name, string $description, int $minLength): self
    {
        $typeString = new self($name, $description);

		if ($minLength < 0) {
			throw new \InvalidArgumentException('Min length must be higher that zero');
		}

		$typeString->minLength = $minLength;

        return $typeString;
    }

    public static function withMaxLength(string $name, string $description, int $maxLength): self
    {
        $typeString = new self($name, $description);

		if ($maxLength < 1) {
			throw new \InvalidArgumentException('Max length must be higher that one');
		}

		$typeString->maxLength = $maxLength;

        return $typeString;
    }

    public static function withRangeLength(string $name, string $description, int $minLength, int $maxLength): self
    {
        $typeString = new self($name, $description);

		if ($maxLength < 1) {
			throw new \InvalidArgumentException('Max length must be higher that one');
		}

		if ($minLength < 0) {
			throw new \InvalidArgumentException('Min length must be higher that zero');
		}

		if ($maxLength < $minLength) {
			throw new \InvalidArgumentException('Max length lower that min length');
		}

		$typeString->maxLength = $maxLength;
		$typeString->minLength = $minLength;

		return $typeString;
    }

    public static function withPattern(string $name, string $description, string $pattern): self
    {
        $typeString = new self($name, $description);

        // Taken from https://github.com/opis/json-schema/blob/19868514d5e4c27553b21c7f0cf6388734c67d18/src/Validator.php

        $match = @preg_match(self::BELL.$pattern.self::BELL.'u', 'dummy_data');

        if (false === $match) {
            throw new \InvalidArgumentException('Pattern '.$pattern.' is not a valid regex');
        }

        $typeString->pattern = $pattern;

        return $typeString;
    }

}
