<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test;

use Musement\JsonSchema\Types\Libs\Range;
use Musement\JsonSchema\Types\TypeBoolean;
use Musement\JsonSchema\Types\TypeInteger;
use Musement\JsonSchema\Types\TypeString;

final class TypeBooleanTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeBooleanIsCreatedWithTypeBoolean()
	{
		$mySchema = new TypeBoolean("foo1", "My boolean");
		$this->assertSame("boolean", $mySchema->getType());
	}

}