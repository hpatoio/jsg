<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\Property\OptionalObjectProperty;
use Hpatoio\JsonSchema\Types\Property\RequiredObjectProperty;
use Hpatoio\JsonSchema\Types\TypeBoolean;
use Hpatoio\JsonSchema\Types\TypeInteger;
use Hpatoio\JsonSchema\Types\TypeObject;

final class TypeObjectTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeObjectThrowExceptionIfCreatedWithNoProperties()
	{
		$this->expectException(\InvalidArgumentException::class);
		new TypeObject("foo1", "My Test Object", ...[]);
	}

	public function testNonRequiredPropertiesAreReturnedCorrectly()
	{
		$mySchema = new TypeObject("foo1", "My Test Object", ...[
			new OptionalObjectProperty(new TypeBoolean("bar", "True or false"))
		]);

		$this->assertCount(1, $mySchema->getProperties());
		$this->assertFalse($mySchema->hasRequiredProperties());
	}

	public function testRequiredPropertiesAreReturnedAsProperties()
	{
		$mySchema = new TypeObject("foo1", "My Test Object", ...[
			new RequiredObjectProperty(new TypeBoolean("bar", "True or false"))
		]);

		$this->assertCount(1, $mySchema->getProperties());
		$this->assertTrue($mySchema->hasRequiredProperties());
		$this->assertCount(1, $mySchema->getRequiredProperties());
	}

	public function testAddPropertyThrowExceptionIfSamePropertyIsAddedTwice()
	{
		$this->expectException(\InvalidArgumentException::class);

		new TypeObject("foo1", "My Test Object", ...[
				new OptionalObjectProperty(new TypeBoolean("bar", "True or false")),
				new RequiredObjectProperty(new TypeInteger("bar", "How many ?"))
			]
		);
	}

}
