<?php

declare(strict_types=1);

namespace Musement\PHPStan\Rules;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Type\ObjectType;

final class CheckExceptionInNamespace implements Rule
{
    private $sourceNamespace;

    private $allowedExceptionNamespace;

    public function __construct(string $sourceNamespace, string $allowedExceptionNamespace)
    {
        $this->sourceNamespace = $sourceNamespace;
        $this->allowedExceptionNamespace = $allowedExceptionNamespace;
    }

    public function getNodeType(): string
    {
        return Node\Stmt\Throw_::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node->expr instanceof Node\Expr\New_) {
            // Only catch "throw new ..."
            return [];
        }

        if (false === \strpos($scope->getNamespace(), $this->sourceNamespace)) {
            return [];
        }

        $type = $scope->getType($node->expr);

        if ($type instanceof ObjectType) {
            $obj = new \ReflectionClass($type->getClassName());

            if (!$obj->isSubclassOf($this->allowedExceptionNamespace) && $type->getClassName() != $this->allowedExceptionNamespace) {
                return [
                    \sprintf(
                        'Exception "%s" cannot be thrown in class under namespace "%s". You can only throw %s exceptions',
                        $type->getClassName(),
                        $this->sourceNamespace,
                        $this->allowedExceptionNamespace
                    ),
                ];
            }
        }

        return [];
    }
}
