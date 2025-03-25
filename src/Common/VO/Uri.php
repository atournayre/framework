<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Contracts\Uri\UriInterface;
use Nyholm\Psr7\Uri as NyholmUri;

final class Uri implements UriInterface
{
    private readonly NyholmUri $uri;

    private function __construct(string $uri = '')
    {
        $this->uri = new NyholmUri($uri);
    }

    /**
     * @api
     */
    public static function of(string $uri = ''): self
    {
        return new self($uri);
    }

    public function scheme(): string
    {
        return $this->uri->getScheme();
    }

    public function authority(): string
    {
        return $this->uri->getAuthority();
    }

    public function userInfo(): string
    {
        return $this->uri->getUserInfo();
    }

    public function host(): string
    {
        return $this->uri->getHost();
    }

    public function port(): ?int
    {
        return $this->uri->getPort();
    }

    public function path(): string
    {
        return $this->uri->getPath();
    }

    public function query(): string
    {
        return $this->uri->getQuery();
    }

    public function fragment(): string
    {
        return $this->uri->getFragment();
    }

    public function withScheme(string $scheme): UriInterface
    {
        $newUri = $this->uri->withScheme($scheme);

        return self::of($newUri->__toString());
    }

    public function withUserInfo(string $user): UriInterface
    {
        $newUri = $this->uri->withUserInfo($user);

        return self::of($newUri->__toString());
    }

    public function withUserAndPassword(string $user, string $password): UriInterface
    {
        $newUri = $this->uri->withUserInfo($user, $password);

        return self::of($newUri->__toString());
    }

    public function withHost(string $host): UriInterface
    {
        $newUri = $this->uri->withHost($host);

        return self::of($newUri->__toString());
    }

    public function withPort(int $port): UriInterface
    {
        $newUri = $this->uri->withPort($port);

        return self::of($newUri->__toString());
    }

    public function withoutPort(): UriInterface
    {
        $newUri = $this->uri->withPort(null);

        return self::of($newUri->__toString());
    }

    public function withPath(string $path): UriInterface
    {
        $newUri = $this->uri->withPath($path);

        return self::of($newUri->__toString());
    }

    public function withQuery(string $query): UriInterface
    {
        $newUri = $this->uri->withQuery($query);

        return self::of($newUri->__toString());
    }

    public function withFragment(string $fragment): UriInterface
    {
        $newUri = $this->uri->withFragment($fragment);

        return self::of($newUri->__toString());
    }

    public function __toString(): string
    {
        return (string) $this->uri;
    }

    public function toString(): string
    {
        return (string) $this->uri;
    }
}
