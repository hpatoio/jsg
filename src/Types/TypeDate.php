<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

class TypeDate extends FormattedString
{

	public function __construct(string $description)
    {
        $this->type = 'string';
        parent::__construct($description, 'date');
    }

}
