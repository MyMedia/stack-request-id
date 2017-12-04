<?php

/*
 * This file is part of the qandidate/stack-request-id package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Feedo\Test\Stack;

use Feedo\Stack\Uuid4RequestIdGenerator;

class Uuid4RequestIdGeneratorTest extends TestCase
{
    /**
     * @test
     */
    public function it_generates_a_string()
    {
        $generator = new Uuid4RequestIdGenerator();
        $this->assertInternalType('string', $generator->generate());
    }
}
