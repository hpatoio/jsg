<?php

namespace Musement\JsonSchema;

use Musement\JsonSchema\Serializer\Normalizer\JsonSchemaNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class JsonSchemaGenerator
{
    public static function generate(JsonSchema $schemaDefinition): string
    {
        $serializer = new Serializer([new JsonSchemaNormalizer()], [new JsonEncoder()]);

        return $serializer->serialize($schemaDefinition, 'json');
    }
}
