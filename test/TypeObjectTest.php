<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test;

use Musement\JsonSchema\Types\TypeInteger;
use Musement\JsonSchema\Types\TypeObject;

final class TypeObjectTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeObjectIsCreatedWithTypeObject ()
	{
		$mySchema = new TypeObject("foo1", "http://json-schema.org/draft-xx/schema#", "foo1", "My Test Object");
		$this->assertSame("object", $mySchema->getType());
	}

    public function testTypeObjectIsCreatedWithNoProperties ()
    {
    	$mySchema = new TypeObject("foo1", "http://json-schema.org/draft-xx/schema#", "foo1", "My Test Object");
    	$this->assertCount(0, $mySchema->getProperties());
    }
}
