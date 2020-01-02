<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\TypeBoolean;

final class JsonSchemaTypeTest extends \PHPUnit\Framework\TestCase
{

	public function testGetDescriptionIsReadCorrectly() {
		$myType = new TypeBoolean("foo", "Friend ?");
		$this->assertSame("Friend ?", $myType->getDescription());
	}

}