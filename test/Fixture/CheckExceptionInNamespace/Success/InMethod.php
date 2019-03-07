<?php

declare(strict_types=1);

namespace Musement\PHPStan\Rules\Test\Fixture\CheckExceptionInNamespace\Success;

use Musement\PHPStan\Rules\Test\Exception\AllowedException;

class InMethod
{
    public function foo()
    {
        throw new AllowedException();
    }
}
