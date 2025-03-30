<?php

declare(strict_types=1);

namespace Atournayre\Symfony\VO;

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

    public function withScheme(string $scheme): UriInterface
    {
        return $this
            ->generateUri()
            ->withScheme($scheme)
        ;
    }

    public function withUserInfo(string $user): UriInterface
    {
        return $this
            ->generateUri()
            ->withUserInfo($user)
        ;
    }

    public function withUserAndPassword(string $user, string $password): UriInterface
    {
        return $this
            ->generateUri()
            ->withUserAndPassword($user, $password)
        ;
    }

    public function withHost(string $host): UriInterface
    {
        return $this
            ->generateUri()
            ->withHost($host)
        ;
    }

    public function withPort(int $port): UriInterface
    {
        return $this
            ->generateUri()
            ->withPort($port)
        ;
    }

    public function withoutPort(): UriInterface
    {
        return $this
            ->generateUri()
            ->withoutPort()
        ;
    }

    public function withPath(string $path): UriInterface
    {
        return $this
            ->generateUri()
            ->withPath($path)
        ;
    }

    public function withQuery(string $query): UriInterface
    {
        return $this
            ->generateUri()
            ->withQuery($query)
        ;
    }

    public function withFragment(string $fragment): UriInterface
    {
        return $this
            ->generateUri()
            ->withFragment($fragment)
        ;
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
