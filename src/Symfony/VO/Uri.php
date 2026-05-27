<?php

declare(strict_types=1);

namespace Atournayre\Symfony\VO;

use Atournayre\Common\Exception\RuntimeException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Uri\UriInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final readonly class Uri implements UriInterface
{
    /**
     * @param array<array-key, mixed> $params
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    private function generateUri(): UriInterface
    {
        $url = $this
            ->urlGenerator
            ->generate($this->route, $this->params, UrlGeneratorInterface::ABSOLUTE_URL)
        ;

        return \Atournayre\Common\VO\Uri::of($url);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function scheme(): string
    {
        return $this->generateUri()->scheme();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function authority(): string
    {
        return $this->generateUri()->authority();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function userInfo(): string
    {
        return $this->generateUri()->userInfo();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function host(): string
    {
        return $this->generateUri()->host();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function port(): ?int
    {
        return $this->generateUri()->port();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function path(): string
    {
        return $this->generateUri()->path();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function query(): string
    {
        return $this->generateUri()->query();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function fragment(): string
    {
        return $this->generateUri()->fragment();
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withUserInfo(string $user): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withUserInfo($user);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withoutPort(): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withoutPort();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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
     */
    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
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

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function withFragment(string $fragment): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withFragment($fragment);
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function __toString(): string
    {
        return $this->generateUri()->__toString();
    }

    #[\Deprecated('Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework')]
    public function toString(): string
    {
        return $this->generateUri()->toString();
    }
}
