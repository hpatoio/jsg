<?php

declare(strict_types=1);

namespace Musement\JsonSchema\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

class JsonSchemaNormalizer extends GetSetMethodNormalizer
{
	/**
	 * {@inheritDoc}
	 */
	public function normalize($object, $format = null, array $context = [])
	{
		$data = parent::normalize($object, $format, $context);
		return array_filter($data, function ($value) {

			if (is_array($value)) {
				return  (0 !== count($value));
			}

			if (null !== $value) {
				return  (null !== $value);
			}

		});
	}
}