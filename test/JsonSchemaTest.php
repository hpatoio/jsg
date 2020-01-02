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
 * @group unit
 */
final class JsonSchemaTest extends \PHPUnit\Framework\TestCase
{

	public function testPropertiesAreSetCorrectly()
	{
		$mySchema = new JsonSchema("foo", "My Schema", "My demo schema", ...[
			new OptionalObjectProperty(new TypeBoolean("what", "What ?"))
		]);
		$this->assertSame("foo", $mySchema->getId());
		$this->assertSame("My Schema", $mySchema->getTitle());
		$this->assertSame("My demo schema", $mySchema->getDescription());
		$this->assertSame("http://json-schema.org/draft-07/schema#", $mySchema->getSchema());
	}

	public function testRequiredPropertiesAreSetCorrectly()
	{
		$mySchema = new JsonSchema("foo", "My Schema", "My demo schema", ...[
			new RequiredObjectProperty(new TypeBoolean("what", "What ?")),
			new OptionalObjectProperty(new TypeBoolean("what_2", "What 2 ?")),
			new RequiredObjectProperty(new TypeBoolean("what_3", "What 3 ?"))
		]);
		$this->assertSame(["what", "what_3"], $mySchema->getRequired());
	}

	public function testJsonSchemaThrowExceptionIfSchemaIsCreatedWithoutProperties()
	{
		$this->expectException(\InvalidArgumentException::class);
		new JsonSchema("foo", "My Schema", "My demo schema", ...[]);
	}

	public function testJsonSchemaThrowExceptionIfSchemaIsCreatedWithoutTwoPropertiesWithTheSameName()
	{
		$this->expectException(\InvalidArgumentException::class);
		new JsonSchema("foo", "My Schema", "My demo schema", ...[
			new OptionalObjectProperty(TypeInteger::from(10, "foo1", "Foo 1")),
			new OptionalObjectProperty(TypeInteger::from(10, "foo1", "Foo 2")),
		]);
	}

}