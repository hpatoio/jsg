<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test;

use Musement\JsonSchema\Types\Libs\Range;
use Musement\JsonSchema\Types\TypeInteger;

final class TypeIntegerTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeIntegerIsCreatedWithTypeInteger()
	{
		$mySchema = new TypeInteger("My Integer");
		$this->assertSame("integer", $mySchema->getType());
	}

    public function testTypeIntegerIsCreatedWithNoMinimumAndMaximumByDefault ()
    {
		$mySchema = new TypeInteger("My integer");

		$this->assertNull($mySchema->getMinimum());
		$this->assertNull($mySchema->getMaximum());
	}

	public function testTypeIntegerIsCreatedWithRightRange()
	{
		$mySchema = TypeInteger::fromTo( 10,20, "My integer");

		$this->assertSame(10, $mySchema->getMinimum());
		$this->assertSame(20, $mySchema->getMaximum());
	}

	public function testTypeIntegerIsCreatedCorrectlyWithMaximum()
	{
		$mySchema = TypeInteger::to( 20, "My integer");

		$this->assertSame(20, $mySchema->getMaximum());
		$this->assertNull($mySchema->getMinimum());
	}


	public function testTypeIntegerIsCreatedCorrectlyWithMinimum()
	{
		$mySchema = TypeInteger::from(10, "My integer");

		$this->assertSame(10, $mySchema->getMinimum());
		$this->assertNull($mySchema->getMaximum());

	}

	public function testTypeIntegerThrowExceptionIfMinimumIsHigherThanMaximum()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeInteger::fromTo( 20, 10, "My integer");
	}

}
