<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Templating;

use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Templating\TemplatingInterface;
use Atournayre\Exception\RuntimeException;
use Twig\Environment;
use Twig\Error\Error;

final readonly class TwigTemplatingService implements TemplatingInterface
{
    public function __construct(
        private Environment $twigEnvironment,
    ) {
    }

    /**
     * @throws ThrowableInterface
     */
    public function render(string $template, array $parameters = []): string
    {
        try {
            return $this->twigEnvironment->render($template, $parameters);
        } catch (Error $e) {
            RuntimeException::fromThrowable($e)->throw();
        }
    }
}
