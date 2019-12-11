<?php

namespace Hpatoio\JsonSchema;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;

class JsonSchemaGenerator
{
    public static function generate(JsonSchema $schemaDefinition): string
    {
        AnnotationRegistry::registerLoader('class_exists');

        $serializer = SerializerBuilder::create()->build();

        return $serializer->serialize($schemaDefinition, 'json');
    }
}
