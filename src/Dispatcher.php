<?php
namespace SmsOrange;

/**
 * Class Dispatcher
 *
 * Router for the booking service requests.
 *
 * @package SmsOrange
 */
class Dispatcher
{
    private $service;

    /**
     * Dispatcher constructor.
     *
     * @param Bookable $service instance of Cruise or Tour
     */
    public function __construct(Bookable $service)
    {
        $this->service = $service;
    }

    /**
     * Calls the injected service's search method.
     *
     * @param array $parameters search form
     * @return mixed (\Unirest\Response object)
     */
    public function search( $parameters )
    {
        return $this->service->search( $parameters );
    }

    /**
     * Handles package selection by service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function select( $parameters )
    {
        return $this->service->select( $parameters );
    }

    /**
     * Gets the components for a service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function getComponents( $parameters )
    {
        return $this->service->getComponents( $parameters );
    }

    /**
     * Gets the available categories for a service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function getAvailableCategories( $parameters )
    {
        return $this->service->getAvailableCategories( $parameters );
    }

    /**
     * Gets the cabins for a service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function getCabins( $parameters )
    {
        return $this->service->getCabins( $parameters );
    }

    /**
     * Gets the price quote for a service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function getQuote( $parameters )
    {
        return $this->service->getQuote( $parameters );
    }

    /**
     * Holds the cabin for a service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function holdCabin( $parameters )
    {
        return $this->service->holdCabin( $parameters );
    }

    /**
     * Handles the final booking step by service.
     *
     * @param array $parameters
     * @return mixed (\Unirest\Response object)
     */
    public function book( $parameters )
    {
        return $this->service->book( $parameters );
    }
}
