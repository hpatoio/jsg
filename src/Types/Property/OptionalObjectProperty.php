<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Types\Property;

class OptionalObjectProperty extends ObjectProperty
{
    public function isRequired(): bool
    {
        return false;
    }
}
