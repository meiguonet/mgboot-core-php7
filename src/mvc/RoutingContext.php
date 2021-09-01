<?php

namespace mgboot\core\mvc;

use mgboot\core\exception\HttpError;
use mgboot\core\http\server\Request;
use mgboot\core\http\server\Response;
use Throwable;

final class RoutingContext
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var bool
     */
    private $hasNext = true;

    private function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    private function __clone()
    {
    }

    public static function create(Request $request, Response $response): RoutingContext
    {
        return new self($request, $response);
    }

    public function next(?bool $arg0 = null): bool
    {
        if (is_bool($arg0)) {
            $this->hasNext = $arg0;
            return true;
        }

        return $this->hasNext;
    }

    public function hasError(): bool
    {
        $payload = $this->response->getPayload();
        return $payload instanceof Throwable || $payload instanceof HttpError;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
