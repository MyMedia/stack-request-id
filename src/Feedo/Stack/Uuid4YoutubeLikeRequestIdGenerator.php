<?php

/*
 * This file is part of the qandidate/stack-request-id package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Feedo\Stack;

use Ramsey\Uuid\Uuid;

/**
 * Generates a uuid for the request id.
 */
class Uuid4YoutubeLikeRequestIdGenerator implements RequestIdGenerator
{
    /**
     * {@inheritDoc}
     * @throws \LogicException
     */
    public function generate()
    {
        if (!class_exists(Uuid::class)) {
            throw new \LogicException('Uuid4YoutubeLikeRequestIdGenerator requires library ramsey/uuid.');
        }

        $uuid = Uuid::uuid4();
        $uuid = str_replace('-', '', $uuid->toString());
        $uuidBin = hex2bin($uuid);
        $uuidBase64 = base64_encode($uuidBin);
        $uuidBase64 = rtrim($uuidBase64, "=\n");
        $hash = strtr($uuidBase64, '/+', '_-');

        return $hash;
    }
}
