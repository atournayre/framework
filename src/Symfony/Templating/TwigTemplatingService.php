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

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class TwigTemplatingService implements TemplatingInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(
        private Environment $twigEnvironment,
    ) {
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function render(string $template, array $parameters = []): string
    {
        try {
            return $this->twigEnvironment->render($template, $parameters);
        } catch (SyntaxError|RuntimeError|LoaderError $e) {
            throw RuntimeException::fromThrowable($e);
        }
    }
}
