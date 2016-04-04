<?php
namespace SmsOrange;

use \Unirest\Request;
use \Illuminate\Config\FileLoader;
use \Illuminate\Config\Repository;
use \Illuminate\Filesystem\Filesystem;

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
    protected $api_token;
    protected $headers = [];

    /**
     * Main constructor.
     *
     * Loads up the config and sets up the API key.
     *
     * Utilizes 'illuminate/config' package.
     */
    protected function __construct()
    {
        $basePath = str_finish(dirname(__DIR__), '/');

        $configPath = $basePath . 'config';

        $loader = new FileLoader(new Filesystem, $configPath);

        $this->config = new Repository($loader, null);

        $this->api_token = $this->config->get("app.api_token");
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
