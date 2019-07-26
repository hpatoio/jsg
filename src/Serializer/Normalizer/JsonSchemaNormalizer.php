<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class JsonSchemaNormalizer extends GetSetMethodNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        $data = parent::normalize($object, $format, $context);

        if (is_array($data)) {
            return array_filter($data, function ($value) {
                if (is_array($value)) {
                    return  0 !== count($value);
                }

                return null !== $value;
            });
        }

        throw new \RuntimeException('JsonSchemaNormalizer can only serialize arrays.');
    }
}
