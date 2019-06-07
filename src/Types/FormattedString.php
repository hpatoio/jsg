<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Types;

abstract class FormattedString extends JsonSchemaType
{

	protected $format;

	public function __construct(string $description, string $format)
	{
		$this->description = $description;
		$this->type = 'string';
		$this->format = $format;
	}

	public function getFormat(): string
	{
		return $this->format;
	}

}
