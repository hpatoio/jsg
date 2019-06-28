<?php


namespace Musement\JsonSchema;

use Musement\JsonSchema\Types\TypeObject;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class JsonSchemaGenerator
{

	private $serializer;

	public function __construct(SerializerInterface $serializer = null)
	{

		if (null === $serializer) {
			$serializer = new Serializer(
				[new ObjectNormalizer()],
				[new JsonEncoder()]
			);
		}

		$this->serializer = $serializer;
	}

	public function generateSchemaFor(JsonSchema $schemaDefinition): string {

		return $this->serializer->serialize($schemaDefinition, 'json');

	}

}