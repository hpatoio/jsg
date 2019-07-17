<?php

namespace Musement\JsonSchema;

use Musement\JsonSchema\Serializer\Normalizer\JsonSchemaNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class JsonSchemaGenerator
{
    public static function generate(JsonSchema $schemaDefinition, SerializerInterface $serializer = null): string
    {

    	if (null === $serializer) {
			$serializer = new Serializer(
				[new JsonSchemaNormalizer()],
				[new JsonEncoder()]
			);
		}

        return $serializer->serialize($schemaDefinition, 'json');
    }
}
