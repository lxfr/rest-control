<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\Tests\TestCase;

use Api\TestCase\ChainObject;
use Api\TestCase\Request;
use Api\TestCase\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testExpectedRequest()
    {
        $response = new Response();
        $this->assertInstanceOf(Request::class, $response->expectedRequest());
        $this->assertSame(1, $response->_getChainLength());
        $this->assertInstanceOf(Request::class, $response->expectedRequest());
        $this->assertSame(1, $response->_getChainLength());
    }

    public function testJson()
    {
        $response = new Response();
        $response->json(false, true);

        $this->assertSame(1, $response->_getChainLength());

        $obj = $response->_getChainObject(Response::CO_JSON);
        $this->assertInstanceOf(ChainObject::class, $obj);

        $this->assertFalse($obj->getParam(0));
        $this->assertTrue($obj->getParam(1));
    }

    public function testJsonPath()
    {
        $response = new Response();
        $response->jsonPath('sample.path', '==', 123);

        $this->assertSame(1, $response->_getChainLength());

        $obj = $response->_getChainObject(Response::CO_JSON_PATH);
        $this->assertInstanceOf(ChainObject::class, $obj);

        $this->assertSame('sample.path', $obj->getParam(0));
        $this->assertSame('==', $obj->getParam(1));
        $this->assertSame(123, $obj->getParam(2));
    }

    public function testJsonPaths()
    {
        $response = new Response();
        $response->jsonPaths([
            ['sample.path', '==', 123],
            ['2sample.path', '!=', 'sample value']
        ]);

        $this->assertSame(2, $response->_getChainLength());

        $objs = $response->_getChainObjects(Response::CO_JSON_PATH);
        $this->assertCount(2, $objs);
        $this->assertInstanceOf(ChainObject::class, $objs[0]);
        $this->assertInstanceOf(ChainObject::class, $objs[1]);

        $this->assertSame('sample.path', $objs[0]->getParam(0));
        $this->assertSame('==', $objs[0]->getParam(1));
        $this->assertSame(123, $objs[0]->getParam(2));

        $this->assertSame('2sample.path', $objs[1]->getParam(0));
        $this->assertSame('!=', $objs[1]->getParam(1));
        $this->assertSame('sample value', $objs[1]->getParam(2));
    }
}