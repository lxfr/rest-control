<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\TestCasePipeline\Events;

/**
 * Class AfterTestCaseEvent
 *
 * @package RestControl\TestCasePipeline\Events
 */
class AfterTestCaseEvent extends BeforeTestCaseEvent
{
    const NAME = 'after.testCase';
}