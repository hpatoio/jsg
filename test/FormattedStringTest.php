<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Test;

use Musement\JsonSchema\Types\Libs\Range;
use Musement\JsonSchema\Types\TypeDate;
use Musement\JsonSchema\Types\TypeDateTime;
use Musement\JsonSchema\Types\TypeEmail;
use Musement\JsonSchema\Types\TypeInteger;
use Musement\JsonSchema\Types\TypeString;
use Musement\JsonSchema\Types\TypeTime;

final class FormattedStringTest extends \PHPUnit\Framework\TestCase
{

	public function testTypeDateIsCreatedWithTypeStringAndDateFormat()
	{
		$mySchema = new TypeDate("My date");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("date", $mySchema->getFormat());
	}

	public function testTypeDateTimeIsCreatedWithTypeStringAndDateTimeFormat()
	{
		$mySchema = new TypeDateTime("My date time");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("date-time", $mySchema->getFormat());
	}


	public function testTypeEmailIsCreatedWithTypeStringAndEmailFormat()
	{
		$mySchema = new TypeEmail("My email");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("email", $mySchema->getFormat());
	}


	public function testTypeTimeIsCreatedWithTypeStringAndTimeFormat()
	{
		$mySchema = new TypeTime("My time");
		$this->assertSame("string", $mySchema->getType());
		$this->assertSame("time", $mySchema->getFormat());
	}

}
