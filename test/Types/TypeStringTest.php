<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\Libs\Range;
use Hpatoio\JsonSchema\Types\TypeString;

final class TypeStringTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeStringThrowExceptionIfMinLengthIsHigherThanMaxLength()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeString::withRangeLength("foo","My string", 11, 10);
	}

	public function testTypeStringCanBeCreateWithSameMaxLengthAndMinLength()
	{
		$myString = TypeString::withRangeLength("foo","My string", 10, 10);
		$this->assertInstanceOf(TypeString::class, $myString);
	}

	public function testTypeStringThrowExceptionIfPatternIsInvalid()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeString::withPattern("foo","My string", "^(0-9]{3}))?[0-9]{3}-[0-9]{4}$");
	}

	public function testTypeStringThrowExceptionIfMinLenghtIsSetNegative()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeString::withMinLength("foo","My string", -1);
	}

	public function testTypeStringThrowExceptionIfMaxLenghtIsSetToZero()
	{
		$this->expectException(\InvalidArgumentException::class);
		TypeString::withMaxLength("foo","My string", 0);
	}

}
