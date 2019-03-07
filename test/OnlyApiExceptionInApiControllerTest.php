<?php

declare(strict_types=1);

namespace Musement\PHPStan\Rules\Test;

use Musement\PHPStan\Rules\CheckExceptionInNamespace;
use PHPStan\Rules\Rule;

final class CheckExceptionInNamespaceTest extends AbstractTestCase
{
    public function providerAnalysisSucceeds(): \Generator
    {
        $paths = [
            'directly' => __DIR__.'/Fixture/CheckExceptionInNamespace/Success/Directly.php',
            'in-method' => __DIR__.'/Fixture/CheckExceptionInNamespace/Success/InMethod.php',
        ];

        foreach ($paths as $description => $path) {
            yield $description => [
                $path,
            ];
        }
    }

    public function providerAnalysisFails(): \Generator
    {
        $paths = [
            'directly' => [
                __DIR__.'/Fixture/CheckExceptionInNamespace/Failure/Directly.php',
                [
                    'Exception "Musement\PHPStan\Rules\Test\Exception\NotAllowedException" cannot be thrown in class under namespace "Musement\PHPStan\Rules\Test\Fixture\CheckExceptionInNamespace". You can only throw Musement\PHPStan\Rules\Test\Exception\AllowedException exceptions',
                     9,
                ],
            ],
            'in-method' => [
                __DIR__.'/Fixture/CheckExceptionInNamespace/Failure/InMethod.php',
                [
                    'Exception "Musement\PHPStan\Rules\Test\Exception\NotAllowedException" cannot be thrown in class under namespace "Musement\PHPStan\Rules\Test\Fixture\CheckExceptionInNamespace". You can only throw Musement\PHPStan\Rules\Test\Exception\AllowedException exceptions',
                    13,
                ],
            ],
        ];

        foreach ($paths as $description => [$path, $error]) {
            yield $description => [
                $path,
                $error,
            ];
        }
    }

    protected function getRule(): Rule
    {
        return new CheckExceptionInNamespace(
            'Musement\PHPStan\Rules\Test\Fixture\CheckExceptionInNamespace',
            "Musement\PHPStan\Rules\Test\Exception\AllowedException"
        );
    }
}
