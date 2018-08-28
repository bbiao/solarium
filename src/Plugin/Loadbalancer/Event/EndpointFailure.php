<?php

namespace Solarium\Plugin\Loadbalancer\Event;

use Solarium\Core\Client\Endpoint;
use Solarium\Exception\HttpException;
use Symfony\Component\EventDispatcher\Event;

/**
 * EndpointFailure event, see Events for details.
 */
class EndpointFailure extends Event
{
    /**
     * @var Endpoint
     */
    protected $endpoint;

    /**
     * @var HttpException
     */
    protected $exception;

     /**
     * @var Loadbalancer
     */
    protected $loadbalancer;

    /**
     * Constructor.
     *
     * @param Endpoint      $endpoint
     * @param HttpException $exception
     */
    public function __construct(Endpoint $endpoint, HttpException $exception, Loadbalancer $loadbalancer = null)
    {
        $this->endpoint = $endpoint;
        $this->exception = $exception;
        $this->loadbalancer = $loadbalancer;
    }

    /**
     * @return Endpoint
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return HttpException
     */
    public function getException()
    {
        return $this->exception;
    }

    public function getLoadbalancer()
    {
        return $this->loadbalancer;
    }
}
