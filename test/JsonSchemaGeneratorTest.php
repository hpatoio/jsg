<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test\Types;

use Musement\JsonSchema\JsonSchema;
use Musement\JsonSchema\JsonSchemaGenerator;

/**
 * @group integration
 */
final class JsonSchemaGeneratorTest extends \PHPUnit\Framework\TestCase
{

	public function testEmptySchemaIsGeneratedCorrectly()
	{

		$mySchema = new JsonSchema('foo', 'My schema', "Test schema description");

		$myJsonSchemaGenerator = new JsonSchemaGenerator();

		$generatedSchema = $myJsonSchemaGenerator->generateSchemaFor($mySchema);

		$this->assertJsonStringEqualsJsonFile( __DIR__. "/fixtures/empty-schema.json", $generatedSchema);

	}

}
