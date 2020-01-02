<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test;

use Hpatoio\JsonSchema\JsonSchema;
use Hpatoio\JsonSchema\JsonSchemaGenerator;
use Hpatoio\JsonSchema\Types\Property\OptionalObjectProperty;
use Hpatoio\JsonSchema\Types\Property\RequiredObjectProperty;
use Hpatoio\JsonSchema\Types\TypeBoolean;
use Hpatoio\JsonSchema\Types\TypeDate;
use Hpatoio\JsonSchema\Types\TypeDateTime;
use Hpatoio\JsonSchema\Types\TypeEmail;
use Hpatoio\JsonSchema\Types\TypeInteger;
use Hpatoio\JsonSchema\Types\TypeObject;
use Hpatoio\JsonSchema\Types\TypeString;

/**
 * @group integration
 */
final class JsonSchemaGeneratorTest extends \PHPUnit\Framework\TestCase
{

	public function testSchemaWithDifferentTypeIsGeneratedCorrectly()
	{

		$generatedJson = JsonSchemaGenerator::generate(
			new JsonSchema('foo', 'My schema', "Test schema description", ...[
				new OptionalObjectProperty(new TypeBoolean("top", "Is a top developer ?")),
				new RequiredObjectProperty(new TypeDate("birthdate", "Birthdate ?")),
				new OptionalObjectProperty(new TypeDateTime("interview_at", "Interview planned for ?")),
				new RequiredObjectProperty(new TypeEmail("email", "Email address ?")),
				new RequiredObjectProperty(TypeInteger::from(100, "minimum_salary", "Minimum salary ?")),

				new OptionalObjectProperty(TypeInteger::to(200, "max_days_in_office", "Max number of days in office ?")),
				new OptionalObjectProperty(new TypeObject("address", "Address", ...[
					new OptionalObjectProperty(TypeString::withMinLength("street", "Street", 0)),
					new OptionalObjectProperty(TypeString::withMinLength("city", "City", 0))
				]))
			])
		);


		$this->assertJsonStringEqualsJsonFile(__DIR__."/fixtures/all-types-schema.json", $generatedJson);

	}

	public function testSchemaWithoutRequiredIsGeneratedCorrectly()
	{
		$generatedJson = JsonSchemaGenerator::generate(
			new JsonSchema('foo', 'My schema', "Test schema description", ...[
				new OptionalObjectProperty(new TypeEmail("email", "Email address ?")),
			])
		);

		$this->assertJsonStringEqualsJsonFile(__DIR__."/fixtures/no-required-schema.json", $generatedJson);
	}

}