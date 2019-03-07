<?php

declare(strict_types=1);

namespace Musement\PHPStan\Rules\Test;

use PHPStan\Testing\RuleTestCase;

/**
 * @internal
 */
abstract class AbstractTestCase extends RuleTestCase
{
    /**
     * @dataProvider providerAnalysisSucceeds
     *
     * @param string $path
     */
    final public function testAnalysisSucceeds(string $path): void
    {
        $this->analyse(
            [
                $path,
            ],
            []
        );
    }

    /**
     * @dataProvider providerAnalysisFails
     *
     * @param string $path
     * @param array  $error
     */
    public function testAnalysisFails(string $path, array $error): void
    {
        $this->analyse(
            [
                $path,
            ],
            [
                $error,
            ]
        );
    }

    abstract public function providerAnalysisSucceeds(): \Generator;

    abstract public function providerAnalysisFails(): \Generator;
}
