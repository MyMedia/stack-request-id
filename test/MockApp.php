<?php

/*
 * This file is part of the ${ProjectName} package.
 *
 * (c) Feedo <vyvoj@feedo.cz>
 * (c) Denis Voytyuk <denis@voituk.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Feedo\Test\Stack;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class MockApp implements HttpKernelInterface
{
    private $headerValue;
    private $recordHeader;

    public function __construct($recordHeader)
    {
        $this->recordHeader = $recordHeader;
    }

    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        $this->headerValue = $request->headers->get($this->recordHeader);

        return new Response();
    }

    public function getLastHeaderValue()
    {
        return $this->headerValue;
    }
}
