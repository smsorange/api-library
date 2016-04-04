<?php
namespace SmsOrange;

/**
 * Class Cruise
 *
 * Cruise booking service.
 *
 * @package SmsOrange
 */
class Cruise extends Main implements Bookable
{
    private $serviceName;
    private $responseType;
    private $apiUrl;
    private $reflection;
    private $apiParams;
    private $token;

    /**
     * Cruise constructor.
     *
     * Sets the service name, response type and prepares
     * the api parameters.
     *
     */
    public function __construct($token)
    {
        parent::__construct();

        $this->token = $token;

        $this->reflection = new \ReflectionClass(__CLASS__);

        $this->serviceName = $this->reflection->getShortName();

        $this->responseType = $this->config->get("app.{$this->serviceName}.response_type");

        $this->apiUrl = $this->config->get("app.{$this->serviceName}.url");

        $this->apiParams = [
            'api_token' => $token,
            'api_type' => $this->config->get("app.{$this->serviceName}.response_type"),
        ];
    }

    /**
     * Implementation of the Bookable contract's search method.
     *
     * Calls on the service API search.
     *
     * @param bool $parameters
     * @return object
     */
    public function search($parameters = false)
    {
        $method = $this->getApiMethod($this->serviceName, __FUNCTION__);

        $body = array_merge($parameters, $this->apiParams);

        $resp = $this->executeRequest($this->apiUrl, $method, $body);

        return $resp;
    }

    /**
     * Implementation of the Bookable contract's select method.
     *
     * Calls on the service API cruise select.
     *
     * @param bool $parameters
     * @return object
     */
    public function select($parameters = false)
    {
        $method = $this->getApiMethod($this->serviceName, __FUNCTION__);

        parse_str($parameters['data'], $params);

        $selectUrl = $method . $params['webservice'] . '/' . $params['cruise-code'];

        $body = $this->apiParams;

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

    /**
     * Implementation of the Bookable contract's getComponents method.
     *
     * Calls on the service API cruise getComponents.
     *
     * @param bool $parameters
     * @return object
     */
    public function getComponents($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getComponents($parameters);
    }

    /**
     * Implementation of the Bookable contract's getAvailableCategories method.
     *
     * Calls on the service API cruise getAvailableCategories.
     *
     * @param bool $parameters
     * @return object
     */
    public function getAvailableCategories($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getAvailableCategories($parameters);
    }

    /**
     * Implementation of the Bookable contract's getCabins method.
     *
     * Calls on the service API cruise getCabins.
     *
     * @param bool $parameters
     * @return object
     */
    public function getCabins($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getCabins($parameters);
    }

    /**
     * Implementation of the Bookable contract's getQuote method.
     *
     * Calls on the service API cruise getQuote.
     *
     * @param bool $parameters
     * @return object
     */
    public function getQuote($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getQuote($parameters);
    }

    /**
     * Implementation of the Bookable contract's holdCabin method.
     *
     * Calls on the service API cruise holdCabin.
     *
     * @param bool $parameters
     * @return object
     */
    public function holdCabin($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->holdCabin($parameters);
    }

    /**
     * Implementation of the Bookable contract's book method.
     *
     * Calls on the service API cruise book.
     *
     */
    public function book($parameters = false)
    {
        $webserviceId = $parameters['webservice'];

        $webserviceName = $this->config->get("app.{$this->serviceName}.webservices.{$webserviceId}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->book($parameters);
    }

}
