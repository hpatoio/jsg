<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test;

use Hpatoio\JsonSchema\JsonSchema;
use Hpatoio\JsonSchema\JsonSchemaGenerator;
use Hpatoio\JsonSchema\JsonSchemaHydrator;
use Hpatoio\JsonSchema\Types\TypeBoolean;
use Hpatoio\JsonSchema\Types\TypeDate;
use Hpatoio\JsonSchema\Types\TypeDateTime;
use Hpatoio\JsonSchema\Types\TypeEmail;
use Hpatoio\JsonSchema\Types\TypeInteger;

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
