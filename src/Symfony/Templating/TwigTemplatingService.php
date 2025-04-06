<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Templating;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Templating\TemplatingInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class TwigTemplatingService implements TemplatingInterface
{
    private Environment $twigEnvironment;

    public function __construct(
        Environment $twigEnvironment,
    ) {
        $this->twigEnvironment = $twigEnvironment;
    }

    /**
     * @throws ThrowableInterface
     */
    public function render(string $template, array $parameters = []): string
    {
        try {
            return $this->twigEnvironment->render($template, $parameters);
        } catch (SyntaxError|RuntimeError|LoaderError $e) {
            RuntimeException::fromThrowable($e)->throw();
        }
    }
}
