<?php

declare(strict_types=1);

namespace Fig\Http\Message;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ServerRequestUtil
{
    /**
     * Converts a RequestInterface to a ServerRequestInterface.
     *
     * @param ServerRequestFactoryInterface $serverRequestFactory
     * @param RequestInterface $request
     * @return ServerRequestInterface
     */
    public static function toServerRequest(
        ServerRequestFactoryInterface $serverRequestFactory,
        RequestInterface $request
    ): ServerRequestInterface {
        if ($request instanceof ServerRequestInterface) {
            return $request;
        }

        $serverRequest = $serverRequestFactory
            ->createServerRequest($request->getMethod(), $request->getUri())
            ->withProtocolVersion($request->getProtocolVersion())
            ->withRequestTarget($request->getRequestTarget())
            ->withBody($request->getBody());

        /** @var array<int|string,string[]> $headers */
        $headers = $request->getHeaders();
        foreach ($headers as $name => $value) {
            $serverRequest = $serverRequest->withHeader(strval($name), $value);
        }

        return $serverRequest;
    }
}
