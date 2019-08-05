<?php

namespace Musement\JsonSchema;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;

class JsonSchemaHydrator
{
    public static function hydrate(string $schema): JsonSchema
    {
        AnnotationRegistry::registerLoader('class_exists');

        $serializer = SerializerBuilder::create()->build();

        return $serializer->deserialize($schema, JsonSchema::class, 'json');
    }
}
