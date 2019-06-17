<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test\Types;

use Musement\JsonSchema\Types\TypeBoolean;

final class TypeBooleanTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeBooleanIsCreatedWithTypeBoolean()
	{
		$mySchema = new TypeBoolean("foo1", "My boolean");
		$this->assertSame("boolean", $mySchema->getType());
	}

}