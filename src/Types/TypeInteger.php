<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types;

use JMS\Serializer\Annotation as JMS;

class TypeInteger extends JsonSchemaType
{
    /**
     * @var int
     * @JMS\Type("integer")
     */
    protected $minimum;

    /**
     * @var int
     * @JMS\Type("integer")
     */
    protected $maximum;

    public function __construct(string $name, string $description)
    {
        parent::__construct($name, $description, 'integer');
    }

    public static function from(int $from, string $name, string $description): self
    {
        $typeNumber = new self($name, $description);
		$typeNumber->minimum = $from;

        return $typeNumber;
    }

    public static function to(int $to, string $name, string $description): self
    {
        $typeNumber = new self($name, $description);
		$typeNumber->maximum = $to;

        return $typeNumber;
    }

    public static function fromTo(int $from, int $to, string $name, string $description): self
    {
        $typeNumber = new self($name, $description);

		if ($from > $to) {
			throw new \InvalidArgumentException('Minimum higher that maximum');
		}

		$typeNumber->minimum = $from;
		$typeNumber->maximum = $to;

		return $typeNumber;
    }

    public function getMinimum(): ? int
    {
        return $this->minimum;
    }

    public function getMaximum(): ? int
    {
        return $this->maximum;
    }
}
