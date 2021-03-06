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

use RestControl\TestCasePipeline\Payload;
use Symfony\Component\EventDispatcher\Event;
use League\Pipeline\PipelineInterface;
use RestControl\ApiClient\ApiClientInterface;
use RestControl\Loader\TestsBag;
use RestControl\TestCasePipeline\TestPipelineConfiguration;

/**
 * Class AfterTestCasePipelineEvent
 *
 * @package RestControl\TestCasePipeline\Events
 */
class AfterTestCasePipelineEvent extends Event
{
    const NAME = 'after.testCasePipeline';

    /**
     * @var PipelineInterface
     */
    protected $pipeline;

    /**
     * @var TestsBag
     */
    protected $testsBag;

    /**
     * @var TestPipelineConfiguration
     */
    protected $configuration;

    /**
     * @var ApiClientInterface
     */
    protected $apiClient;

    /**
     * @var Payload
     */
    protected $payload;

    /**
     * BeforeTestCasePipelineEvent constructor.
     *
     * @param PipelineInterface         $pipeline
     * @param TestsBag                  $testsBag
     * @param TestPipelineConfiguration $configuration
     * @param ApiClientInterface        $apiClient
     * @param Payload                   $payload
     */
    public function __construct(
        PipelineInterface $pipeline,
        TestsBag $testsBag,
        TestPipelineConfiguration $configuration,
        ApiClientInterface $apiClient,
        Payload $payload
    ) {
        $this->pipeline      = $pipeline;
        $this->testsBag      = $testsBag;
        $this->configuration = $configuration;
        $this->apiClient     = $apiClient;
        $this->payload       = $payload;
    }

    /**
     * @return PipelineInterface
     */
    public function getPipeline()
    {
        return $this->pipeline;
    }

    /**
     * @return TestsBag
     */
    public function getTestsBag()
    {
        return $this->testsBag;
    }

    /**
     * @return TestPipelineConfiguration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @return ApiClientInterface
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * @return Payload
     */
    public function getPayload()
    {
        return $this->payload;
    }
}