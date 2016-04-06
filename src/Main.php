<?php
namespace SmsOrange;

use \Unirest\Request;
use \Illuminate\Config\FileLoader;
use \Illuminate\Config\Repository;
use \Illuminate\Filesystem\Filesystem;
use Pimple\Container;

/**
 * Class Main
 *
 * Main abstract class for all booking services.
 *
 * @package SmsOrange
 */
abstract class Main
{
    protected $config;
    protected $headers = [];
    protected $container;

    /**
     * Main constructor.
     *
     * Loads up the config and service container
     *
     * Utilizes 'illuminate/config' package.
     */
    protected function __construct()
    {
        $basePath = str_finish(dirname(__DIR__), '/');

        $configPath = $basePath . 'config';

        $loader = new FileLoader(new Filesystem, $configPath);

        $this->config = new Repository($loader, null);

        $this->container =  new Container();

        $this->bootstrapWebserviceContainer( $this->container );
    }

    /**
     * Registers webservices
     *
     * @param Container $container
     */
    private function bootstrapWebserviceContainer(Container $container)
    {
        $container['CostaCruisesWebservice'] = function ($c) {
            return new Cruise\CostaCruisesWebservice($c['apiUrl'], $c['apiParams']);
        };
    }

    /**
     * Get the concrete webservice object of a specific service,
     * from the container
     *
     * @param string $type
     * @param int $wsId
     * @param string $url
     * @param array $params
     * @return mixed
     */
    final protected function getWebservice($type, $wsId, $url, $params)
    {
        $webserviceName = $this->config->get("app.$type.webservices.$wsId");

        $this->container['apiUrl'] = $url;
        $this->container['apiParams'] = $params;

        return $this->container[$webserviceName];
    }

    /**
     * Returns an API method mapped to the current action.
     *
     * Mappings are read from the config file.
     *
     * @param string $serviceName Cruise, Tour
     * @param string $callerMethod caller function name bound by the Bookable contract
     * @return string name of the API method
     */
    final protected function getApiMethod( $serviceName, $callerMethod )
    {
        return $this->config->get( "app.{$serviceName}.methods." . $callerMethod );
    }

    /**
     * Executes a HTTP Request using the Unirest library (http://unirest.io)
     *
     * @param string $url API base url
     * @param string $method API method
     * @param array $body body of the request
     * @return \Unirest\Response object
     */
    final protected function executeRequest($url, $method, $body)
    {
        $resp = Request::get(
            $url . $method,
            $this->headers,
            $body
        );

        return $resp;
    }
}
