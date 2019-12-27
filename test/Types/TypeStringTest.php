<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\Libs\Range;
use Hpatoio\JsonSchema\Types\TypeString;

final class TypeStringTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeStringIsCreatedWithTypeString()
	{
		$mySchema = new TypeString("foo","My sting");
		$this->assertSame("string", $mySchema->getType());
	}

	public function testTypeStringThrowExceptionIfMinLengthIsSetHigherThanMaxLength()
	{
		$this->expectException(\InvalidArgumentException::class);

		$myString = new TypeString("foo","My string");
		$myString->setMaxLength(10);
		$myString->setMinLength(11);
	}

	public function testTypeStringThrowExceptionIfMaxLengthIsSetLowerThanMinLength()
	{
		$this->expectException(\InvalidArgumentException::class);

		$myString = new TypeString("foo","My string");
		$myString->setMinLength(11);
		$myString->setMaxLength(10);
	}

	public function testTypeStringCanBeCreateWithSameMaxLengthAndMinLength()
	{
		$myString = new TypeString("foo","My string");
		$myString->setMinLength(10);
		$myString->setMaxLength(10);

		$this->assertInstanceOf(TypeString::class, $myString);
	}

	public function testTypeStringThrowExceptionIfPatternIsInvalid()
	{
		$this->expectException(\InvalidArgumentException::class);
		$myString = new TypeString("foo","My string");
		$myString->setPattern("^(0-9]{3}))?[0-9]{3}-[0-9]{4}$");
	}

	public function testTypeStringThrowExceptionIfMinLenghtIsSetNegative()
	{
		$this->expectException(\InvalidArgumentException::class);
		$myString = new TypeString("foo","My string");
		$myString->setMinLength(-1);
	}

	public function testTypeStringThrowExceptionIfMaxLenghtIsSetToZero()
	{
		$this->expectException(\InvalidArgumentException::class);
		$myString = new TypeString("foo","My string");
		$myString->setMaxLength(0);
	}

}
