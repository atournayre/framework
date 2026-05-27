<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Response;

/**
 * @deprecated Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework
 */
interface ResponseInterface
{
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function redirectToUrl(string $url);

    /**
     * @param array<string, mixed> $parameters
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function redirectToRoute(string $route, array $parameters = []);

    /**
     * @param array<string, mixed> $parameters
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function render(string $view, array $parameters = []);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function json(array $data, int $status = 200, array $headers = [], bool $json = false);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function jsonError(array $data, int $status = 400, array $headers = [], bool $json = false);

    /**
     * @param array<string, mixed> $headers
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function file(string $file, string $filename, array $headers = []);

    /**
     * @param array<string, mixed> $headers
     */
    public function empty(int $status = 204, array $headers = []);

    /**
     * @param array<string, mixed> $parameters
     */
    #[\Deprecated("Deprecated immediately. Migrate to https://github.com/TournayreLabs/framework")]
    public function error(string $view, array $parameters = [], int $status = 500);
}
