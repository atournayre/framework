<?php

declare(strict_types=1);

namespace Atournayre\Symfony\Response;

use Atournayre\Contracts\Log\LoggerInterface;
use Atournayre\Contracts\Response\ResponseInterface;
use Atournayre\Contracts\Routing\RoutingInterface;
use Atournayre\Contracts\Templating\TemplatingInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

final class ResponseService implements ResponseInterface
{
    private TemplatingInterface $templating;

    private RoutingInterface $routing;

    private LoggerInterface $logger;

    public function __construct(
        TemplatingInterface $templating,
        RoutingInterface $routing,
        LoggerInterface $logger
    ) {
        $this->logger = $logger;
        $this->routing = $routing;
        $this->templating = $templating;
    }

    public function redirectToUrl(string $url): RedirectResponse
    {
        $this->logger->info('Redirecting to URL: '.$url);

        return new RedirectResponse($url);
    }

    public function redirectToRoute(string $route, array $parameters = []): RedirectResponse
    {
        $url = $this->routing->generate($route, $parameters);
        $this->logger->info('Redirecting to route: '.$route, ['parameters' => $parameters]);

        return $this->redirectToUrl($url);
    }

    public function render(string $view, array $parameters = []): Response
    {
        try {
            $this->logger->info('Rendering view: '.$view, ['parameters' => $parameters]);
            $render = $this->templating->render($view, $parameters);

            return new Response($render);
        } catch (\Error|\Exception $e) {
            $this->logger->error('An error occurred while rendering view', ['error' => $e->getMessage()]);

            return $this->error('error.html.twig', ['error' => 'An error occurred']);
        }
    }

    public function json(array $data, int $status = 200, array $headers = [], bool $json = false): JsonResponse
    {
        try {
            $this->logger->info('Returning JSON response', ['data' => $data, 'status' => $status, 'headers' => $headers]);

            return new JsonResponse($data, $status, $headers, $json);
        } catch (\Error|\Exception $e) {
            $this->logger->error('An error occurred while returning JSON response', ['error' => $e->getMessage()]);

            return $this->jsonError(['error' => 'An error occurred'], 500);
        }
    }

    public function jsonError(array $data, int $status = 400, array $headers = [], bool $json = false): JsonResponse
    {
        $this->logger->error('Returning JSON error response', ['data' => $data, 'status' => $status, 'headers' => $headers]);

        return new JsonResponse($data, $status, $headers, $json);
    }

    public function file(string $file, string $filename, array $headers = []): BinaryFileResponse
    {
        $contentDisposition = $headers['Content-Disposition'] ?? 'attachment';
        $headers['Content-Disposition'] = sprintf('%s; filename="%s"', $contentDisposition, $filename);
        $this->logger->info('Returning file: '.$file, ['filename' => $filename, 'headers' => $headers]);

        return new BinaryFileResponse($file, 200, $headers);
    }

    public function empty(int $status = 204, array $headers = []): Response
    {
        $this->logger->info('Returning empty response', ['status' => $status, 'headers' => $headers]);

        return new Response(null, $status, $headers);
    }

    public function error(string $view, array $parameters = [], int $status = 500): Response
    {
        $this->logger->info('Returning error response', ['view' => $view, 'parameters' => $parameters, 'status' => $status]);
        $render = $this->templating->render($view, $parameters);

        return new Response($render, $status);
    }
}
