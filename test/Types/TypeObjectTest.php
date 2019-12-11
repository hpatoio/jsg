<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\TypeBoolean;
use Hpatoio\JsonSchema\Types\TypeInteger;
use Hpatoio\JsonSchema\Types\TypeObject;

final class TypeObjectTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeObjectIsCreatedWithTypeObject ()
	{
		$mySchema = new TypeObject("foo1", "My Test Object");
		$this->assertSame("object", $mySchema->getType());
	}

    public function testTypeObjectIsCreatedWithNoProperties ()
    {
    	$mySchema = new TypeObject("foo1", "My Test Object");
    	$this->assertCount(0, $mySchema->getProperties());
    }

	public function testAddNonRequiredPropertyOnlyAddTheProperty()
	{
		$mySchema = new TypeObject("foo1", "My Test Object");
		$mySchema->addProperty(new TypeBoolean("bar", "True or false"));
		$this->assertCount(1, $mySchema->getProperties());
		$this->assertCount(0, $mySchema->getRequired());
	}

	public function testNonRequiredPropertyAlsoAddPropertyToRequiredList()
	{
		$mySchema = new TypeObject("foo1", "My Test Object");
		$mySchema->addProperty(new TypeBoolean("bar", "True or false"), true);
		$this->assertCount(1, $mySchema->getProperties());
		$this->assertCount(1, $mySchema->getRequired());
	}

	public function testAddPropertyThrowExceptionIfSamePropertyIsAddedTwice()
	{
		$this->expectException(\InvalidArgumentException::class);
		$mySchema = new TypeObject("foo1", "My Test Object");
		$mySchema->addProperty(new TypeBoolean("bar", "True or false"));
		$mySchema->addProperty(new TypeInteger("bar", "How many ?"));
	}

}
