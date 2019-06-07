<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

class TypeInteger extends JsonSchemaType
{
    protected $minimum;
    protected $maximum;

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->type = 'integer';
    }

    public static function from(int $from, string $description)
    {
        $typeNumber = new self($description);
        $typeNumber->setMinimum($from);

        return $typeNumber;
    }

    public static function to(int $to, string $description)
    {
        $typeNumber = new self($description);
        $typeNumber->setMaximum($to);

        return $typeNumber;
    }

    public static function fromTo(int $from, int $to, string $description)
    {
        $typeNumber = new self($description);
        $typeNumber->setMinimum($from);
        $typeNumber->setMaximum($to);

        return $typeNumber;
    }

    private function setMinimum(int $minimum)
    {
        if (null !== $this->maximum && $minimum > $this->maximum) {
            throw new \InvalidArgumentException('Minimum higher that maximum');
        }

        $this->minimum = $minimum;
    }

    private function setMaximum(int $maximum)
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
