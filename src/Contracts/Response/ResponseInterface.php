<?php

declare(strict_types=1);

namespace Atournayre\Contracts\Response;

interface ResponseInterface
{
    public function redirectToUrl(string $url);

    /**
     * @param array<string, mixed> $parameters
     */
    public function redirectToRoute(string $route, array $parameters = []);

    /**
     * @param array<string, mixed> $parameters
     */
    public function render(string $view, array $parameters = []);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    public function json(array $data, int $status = 200, array $headers = [], bool $json = false);

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    public function jsonError(array $data, int $status = 400, array $headers = [], bool $json = false);

    /**
     * @param array<string, mixed> $headers
     */
    public function file(string $file, string $filename, array $headers = []);

    /**
     * @param array<string, mixed> $headers
     */
    public function empty(int $status = 204, array $headers = []);

    /**
     * @param array<string, mixed> $parameters
     */
    public function error(string $view, array $parameters = [], int $status = 500);
}
