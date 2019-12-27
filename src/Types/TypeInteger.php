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
        $typeNumber->setMinimum($from);

        return $typeNumber;
    }

    public static function to(int $to, string $name, string $description): self
    {
        $typeNumber = new self($name, $description);
        $typeNumber->setMaximum($to);

        return $typeNumber;
    }

    public static function fromTo(int $from, int $to, string $name, string $description): self
    {
        $typeNumber = new self($name, $description);
        $typeNumber->setMinimum($from);
        $typeNumber->setMaximum($to);

        return $typeNumber;
    }

    private function setMinimum(int $minimum): void
    {
        if (null !== $this->maximum && $minimum > $this->maximum) {
            throw new \InvalidArgumentException('Minimum higher that maximum');
        }

        $this->minimum = $minimum;
    }

    private function setMaximum(int $maximum): void
    {
        if (null !== $this->minimum && $maximum < $this->minimum) {
            throw new \InvalidArgumentException('Minimum higher that maximum');
        }

        $this->maximum = $maximum;
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
