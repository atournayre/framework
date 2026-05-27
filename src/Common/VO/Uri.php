<?php

declare(strict_types=1);

namespace Atournayre\Common\VO;

use Atournayre\Common\Exception\InvalidArgumentException;
use Atournayre\Contracts\Exception\ThrowableInterface;
use Atournayre\Contracts\Uri\UriInterface;
use Nyholm\Psr7\Uri as NyholmUri;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
final readonly class Uri implements UriInterface
{
    private NyholmUri $uri;

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    private function __construct(string $uri = '')
    {
        $this->uri = new NyholmUri($uri);
    }

    /**
     * @api
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public static function of(string $uri = ''): self
    {
        return new self($uri);
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function scheme(): string
    {
        return $this->uri->getScheme();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function authority(): string
    {
        return $this->uri->getAuthority();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function userInfo(): string
    {
        return $this->uri->getUserInfo();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function host(): string
    {
        return $this->uri->getHost();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function port(): ?int
    {
        return $this->uri->getPort();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function path(): string
    {
        return $this->uri->getPath();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function query(): string
    {
        return $this->uri->getQuery();
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function fragment(): string
    {
        return $this->uri->getFragment();
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withScheme(string $scheme): UriInterface
    {
        try {
            $newUri = $this->uri->withScheme($scheme);

            return self::of($newUri->__toString());
        } catch (\Throwable $throwable) {
            throw InvalidArgumentException::fromThrowable($throwable);
        }
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withUserInfo(string $user): UriInterface
    {
        $newUri = $this->uri->withUserInfo($user);

        return self::of($newUri->__toString());
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withUserAndPassword(string $user, string $password): UriInterface
    {
        $newUri = $this->uri->withUserInfo($user, $password);

        return self::of($newUri->__toString());
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withHost(string $host): UriInterface
    {
        try {
            $newUri = $this->uri->withHost($host);

            return self::of($newUri->__toString());
        } catch (\Throwable $throwable) {
            throw InvalidArgumentException::fromThrowable($throwable);
        }
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withPort(int $port): UriInterface
    {
        try {
            $newUri = $this->uri->withPort($port);

            return self::of($newUri->__toString());
        } catch (\Throwable $throwable) {
            throw InvalidArgumentException::fromThrowable($throwable);
        }
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withoutPort(): UriInterface
    {
        $newUri = $this->uri->withPort(null);

        return self::of($newUri->__toString());
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withPath(string $path): UriInterface
    {
        try {
            $newUri = $this->uri->withPath($path);

            return self::of($newUri->__toString());
        } catch (\Throwable $throwable) {
            throw InvalidArgumentException::fromThrowable($throwable);
        }
    }

    /**
     * @throws ThrowableInterface
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withQuery(string $query): UriInterface
    {
        try {
            $newUri = $this->uri->withQuery($query);

            return self::of($newUri->__toString());
        } catch (\Throwable $throwable) {
            throw InvalidArgumentException::fromThrowable($throwable);
        }
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function withFragment(string $fragment): UriInterface
    {
        $newUri = $this->uri->withFragment($fragment);

        return self::of($newUri->__toString());
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function __toString(): string
    {
        return (string) $this->uri;
    }

    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function toString(): string
    {
        return (string) $this->uri;
    }
}
