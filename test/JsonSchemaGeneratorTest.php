<?php

declare(strict_types=1);

namespace Hpatoio\JsonSchema\Test;

use Hpatoio\JsonSchema\JsonSchema;
use Hpatoio\JsonSchema\JsonSchemaGenerator;
use Hpatoio\JsonSchema\Types\TypeBoolean;
use Hpatoio\JsonSchema\Types\TypeDate;
use Hpatoio\JsonSchema\Types\TypeDateTime;
use Hpatoio\JsonSchema\Types\TypeEmail;
use Hpatoio\JsonSchema\Types\TypeInteger;

/**
 * @group integration
 */
final class JsonSchemaGeneratorTest extends \PHPUnit\Framework\TestCase
{

	public function testEmptySchemaIsGeneratedCorrectly()
	{
		$this->markTestSkipped("To be implemented");
	}

	public function testSchemaWithDifferentTypeIsGeneratedCorrectly()
	{
		$this->markTestSkipped("To be implemented");
	}

	public function testSchemaWithoutRequiredIsGeneratedCorrectly()
	{
		$this->markTestSkipped("To be implemented");
	}

}
