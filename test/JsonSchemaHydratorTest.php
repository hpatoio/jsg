<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test;

use Musement\JsonSchema\JsonSchema;
use Musement\JsonSchema\JsonSchemaGenerator;
use Musement\JsonSchema\JsonSchemaHydrator;
use Musement\JsonSchema\Types\TypeBoolean;
use Musement\JsonSchema\Types\TypeDate;
use Musement\JsonSchema\Types\TypeDateTime;
use Musement\JsonSchema\Types\TypeEmail;
use Musement\JsonSchema\Types\TypeInteger;

/**
 * @group integration
 */
final class JsonSchemaHydratorTest extends \PHPUnit\Framework\TestCase
{

	public function testModelIsHydratedCorrectly()
	{
		$hydratedSchema = JsonSchemaHydrator::hydrate(\file_get_contents(__DIR__. "/fixtures/all-types-schema.json"));

		$this->assertInstanceOf(JsonSchema::class, $hydratedSchema);
		$this->assertIsArray($hydratedSchema->getProperties());
		$this->assertInstanceOf(TypeBoolean::class, $hydratedSchema->getProperties()['top']);
		$this->assertInstanceOf(TypeDate::class, $hydratedSchema->getProperties()['birthdate']);
		$this->assertInstanceOf(TypeDateTime::class, $hydratedSchema->getProperties()['interview_at']);
		$this->assertInstanceOf(TypeEmail::class, $hydratedSchema->getProperties()['email']);
		$this->assertInstanceOf(TypeInteger::class, $hydratedSchema->getProperties()['minimum_salary']);
	}

}
