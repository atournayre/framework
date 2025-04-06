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

    private function generateUri(): UriInterface
    {
        $url = $this
            ->urlGenerator
            ->generate($this->route, $this->params, UrlGeneratorInterface::ABSOLUTE_URL)
        ;

        return \Atournayre\Common\VO\Uri::of($url);
    }

    public function scheme(): string
    {
        return $this->generateUri()->scheme();
    }

    public function authority(): string
    {
        return $this->generateUri()->authority();
    }

    public function userInfo(): string
    {
        return $this->generateUri()->userInfo();
    }

    public function host(): string
    {
        return $this->generateUri()->host();
    }

    public function port(): ?int
    {
        return $this->generateUri()->port();
    }

    public function path(): string
    {
        return $this->generateUri()->path();
    }

    public function query(): string
    {
        return $this->generateUri()->query();
    }

    public function fragment(): string
    {
        return $this->generateUri()->fragment();
    }

    /**
     * @throws ThrowableInterface
     */
    public function withScheme(string $scheme): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withScheme($scheme);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    public function withUserInfo(string $user): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withUserInfo($user);
    }

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
    public function withHost(string $host): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withHost($host);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function withPort(int $port): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withPort($port);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    public function withoutPort(): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withoutPort();
    }

    public function withPath(string $path): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withPath($path);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    /**
     * @throws ThrowableInterface
     */
    public function withQuery(string $query): UriInterface
    {
        try {
            return self::new(
                $this->urlGenerator,
                $this->route,
                $this->params,
            )->withQuery($query);
        } catch (\Throwable $throwable) {
            RuntimeException::fromThrowable($throwable)->throw();
        }
    }

    public function withFragment(string $fragment): UriInterface
    {
        return self::new(
            $this->urlGenerator,
            $this->route,
            $this->params,
        )->withFragment($fragment);
    }

    public function __toString(): string
    {
        return $this->generateUri()->__toString();
    }

    public function toString(): string
    {
        return $this->generateUri()->toString();
    }
}
