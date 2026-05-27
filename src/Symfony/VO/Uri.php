<?php

declare(strict_types=1);

namespace Atournayre\Symfony\VO;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Uri\UriInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class Uri implements UriInterface
{
    /**
     * @param array<array-key, mixed> $params
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
        private string $route,
        private array $params,
    ) {
    }

    /**
     * @param array<array-key, mixed> $params
     *
     * @api
     */
    public static function new(
        UrlGeneratorInterface $urlGenerator,
        string $route,
        array $params,
    ): self {
        return new self(
            $urlGenerator,
            $route,
            $params,
        );
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function generateUri(): UriInterface
    {
        $url = $this
            ->urlGenerator
            ->generate($this->route, $this->params, UrlGeneratorInterface::ABSOLUTE_URL)
        ;

        return \Atournayre\Common\VO\Uri::of($url);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function scheme(): string
    {
        return $this->generateUri()->scheme();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function authority(): string
    {
        return $this->generateUri()->authority();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function userInfo(): string
    {
        return $this->generateUri()->userInfo();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function host(): string
    {
        return $this->generateUri()->host();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function port(): ?int
    {
        return $this->generateUri()->port();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function path(): string
    {
        return $this->generateUri()->path();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function query(): string
    {
        return $this->generateUri()->query();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function fragment(): string
    {
        return $this->generateUri()->fragment();
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withScheme(string $scheme): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withScheme($scheme);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withUserInfo(string $user): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withUserInfo($user);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withUserAndPassword(string $user, string $password): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withUserAndPassword($user, $password);
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withHost(string $host): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withHost($host);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withPort(int $port): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withPort($port);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withoutPort(): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withoutPort();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withPath(string $path): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withPath($path);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @throws ThrowableInterface
     *
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withQuery(string $query): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withQuery($query);
        } catch (\Throwable $throwable) {
            throw RuntimeException::fromThrowable($throwable);
        }
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withFragment(string $fragment): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withFragment($fragment);
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __toString(): string
    {
        return $this->generateUri()->__toString();
    }

    /**
     * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toString(): string
    {
        return $this->generateUri()->toString();
    }
}
