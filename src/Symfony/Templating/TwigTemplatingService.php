<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Templating;

use Atournayre\Contracts\Templating\TemplatingInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final readonly class TwigTemplatingService implements TemplatingInterface
{
    public function __construct(
        private Environment $twigEnvironment,
    ) {
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render(string $template, array $parameters = []): string
    {
        return $this->twigEnvironment->render($template, $parameters);
    }
}
