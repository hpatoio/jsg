<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test\Types;

use Hpatoio\JsonSchema\Types\TypeDate;
use Hpatoio\JsonSchema\Types\TypeDateTime;
use Hpatoio\JsonSchema\Types\TypeEmail;
use Hpatoio\JsonSchema\Types\TypeTime;

final class FormattedStringTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeDateIsCreatedWithTypeStringAndDateFormat()
	{
		$mySchema = new TypeDate("foo", "My date");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("date", $mySchema->getFormat());
	}

	public function testTypeDateTimeIsCreatedWithTypeStringAndDateTimeFormat()
	{
		$mySchema = new TypeDateTime("foo", "My date time");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("date-time", $mySchema->getFormat());
	}


	public function testTypeEmailIsCreatedWithTypeStringAndEmailFormat()
	{
		$mySchema = new TypeEmail("foo", "My email");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("email", $mySchema->getFormat());
	}

	public function testTypeTimeIsCreatedWithTypeStringAndTimeFormat()
	{
		$mySchema = new TypeTime("foo", "My time");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("time", $mySchema->getFormat());
	}

}
