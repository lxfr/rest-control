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

use PHPUnit\Framework\TestCase;
use RestControl\TestCase\ExpressionLanguage\Expression;

class AbstractTestCaseTest extends TestCase
{
    public function testExpressions()
    {
        $obj = new SampleTestCase();

        $equalsTo = $obj->equalsTo(20, true);
        $this->assertInstanceOf(Expression::class, $equalsTo);
        $this->assertSame(20, $equalsTo->getParam(0));
        $this->assertTrue($equalsTo->getParam(1));

        $containsString = $obj->containsString('sampleString');
        $this->assertInstanceOf(Expression::class, $containsString);
        $this->assertSame('sampleString', $containsString->getParam(0));

        $startsWith = $obj->startsWith('sampleString');
        $this->assertInstanceOf(Expression::class, $startsWith);
        $this->assertSame('sampleString', $startsWith->getParam(0));


        $endsWith = $obj->endsWith('endsWith');
        $this->assertInstanceOf(Expression::class, $endsWith);
        $this->assertSame('endsWith', $endsWith->getParam(0));
    }
}