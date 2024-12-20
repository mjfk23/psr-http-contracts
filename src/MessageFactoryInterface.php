<?php

declare(strict_types=1);

namespace Fig\Http\Message;

use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

interface MessageFactoryInterface extends
    RequestFactoryInterface,
    ServerRequestFactoryInterface,
    UriFactoryInterface,
    StreamFactoryInterface,
    UploadedFileFactoryInterface,
    ResponseFactoryInterface
{
    /**
     * Converts a RequestInterface to a ServerRequestInterface.
     *
     * @param RequestInterface $request
     * @return ServerRequestInterface
     */
    public function toServerRequest(RequestInterface $request): ServerRequestInterface;
}
