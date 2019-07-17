<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test\Types;

use Musement\JsonSchema\JsonSchema;
use Musement\JsonSchema\JsonSchemaGenerator;
use Musement\JsonSchema\Types\TypeBoolean;
use Musement\JsonSchema\Types\TypeDate;
use Musement\JsonSchema\Types\TypeDateTime;
use Musement\JsonSchema\Types\TypeEmail;
use Musement\JsonSchema\Types\TypeInteger;

/**
 * @group integration
 */
final class JsonSchemaGeneratorTest extends \PHPUnit\Framework\TestCase
{

	public function testEmptySchemaIsGeneratedCorrectly()
	{
		$mySchema = new JsonSchema('foo', 'My schema', "Test schema description");
		$generatedSchema = JsonSchemaGenerator::generate($mySchema);

		$this->assertJsonStringEqualsJsonFile( __DIR__. "/fixtures/empty-schema.json", $generatedSchema);
	}

	public function testSchemaWithDifferentTypeIsGeneratedCorrectly()
	{
		$mySchema = new JsonSchema('foo', 'My schema', "Test schema description");
		$mySchema->addProperty(new TypeBoolean('top', "Is a top developer ?"));
		$mySchema->addProperty(new TypeDate('birthdate', "Birthdate ?"), true);
		$mySchema->addProperty(new TypeDateTime('interview_at', "Interview planned for ?"));
		$mySchema->addProperty(new TypeEmail('email', "Email address ?"), true);
		$mySchema->addProperty(TypeInteger::from(100, 'minimum_salary', "Minimum salary ?"), true);

		$generatedSchema = JsonSchemaGenerator::generate($mySchema);
		$this->assertJsonStringEqualsJsonFile( __DIR__. "/fixtures/all-types-schema.json", $generatedSchema);
	}

	public function testSchemaWithoutRequiredIsGeneratedCorrectly()
	{
		$mySchema = new JsonSchema('foo', 'My schema', "Test schema description");
		$mySchema->addProperty(new TypeEmail('email', "Email address ?"));

		$generatedSchema = JsonSchemaGenerator::generate($mySchema);
		$this->assertJsonStringEqualsJsonFile( __DIR__. "/fixtures/no-required-schema.json", $generatedSchema);
	}


}
