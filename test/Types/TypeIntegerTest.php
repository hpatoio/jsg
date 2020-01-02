<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\TypeInteger;

final class TypeIntegerTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeIntegerIsCreatedWithTypeInteger()
	{
		$myInteger = new TypeInteger("foo1", "My Integer");
		$this->assertSame("integer", $myInteger->getType());
	}

	public function testTypeIntegerIsCreatedWithRightRange()
	{
		$myInteger = TypeInteger::fromTo( 10,20, "foo1", "My integer");
		$this->assertSame(10, $myInteger->getMinimum());
		$this->assertSame(20, $myInteger->getMaximum());
	}

	public function testTypeIntegerIsCreatedWithSameRightRange()
	{
		$myInteger = TypeInteger::fromTo( 10,10, "foo1", "My integer");
		$this->assertSame(10, $myInteger->getMinimum());
		$this->assertSame(10, $myInteger->getMaximum());
	}

	public function testTypeIntegerThrowExceptionIfRangeIsNotCorrect()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeInteger::fromTo( 20, 10, "foo1", "My integer");
	}

	public function testTypeIntegerIsCreatedCorrectlyWithMaximum()
	{
		$myInteger = TypeInteger::to( 20, "foo1", "My integer");
		$this->assertSame(20, $myInteger->getMaximum());
	}

	public function testTypeIntegerIsCreatedCorrectlyWithMinimum()
	{
		$myInteger = TypeInteger::from(10, "foo1", "My integer");
		$this->assertSame(10, $myInteger->getMinimum());

	}

}
