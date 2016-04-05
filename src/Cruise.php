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
    private $apiParams;
    private $token;

    /**
     * Cruise constructor.
     *
     * Sets the service name, response type and prepares
     * the api parameters.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        parent::__construct();

        $this->token = $token;

        $this->responseType = $this->config->get("app.Cruise.response_type");

        $this->apiUrl = $this->config->get("app.Cruise.url");

        $this->apiParams = [
            'api_token' => $token,
            'api_type' => $this->config->get("app.Cruise.response_type"),
        ];
    }

    /**
     * Implementation of the Bookable contract's search method.
     *
     * Calls on the service API search.
     *
     * @param array $parameters
     * @return object
     */
    public function search($parameters = [])
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
     * @param array $parameters
     * @return object
     */
    public function select($parameters = [])
    {
        $method = $this->getApiMethod($this->serviceName, __FUNCTION__);

        parse_str($parameters['data'], $params);

        $selectUrl = $method . $params['webservice'] . '/' . $params['cruise-code'];

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $this->apiParams);

        return $resp;
    }

    /**
     * Implementation of the Bookable contract's getComponents method.
     *
     * Calls on the service API cruise getComponents.
     *
     * @param array $parameters
     * @return object
     */
    public function getComponents($parameters = [])
    {
        $webserviceName = $this->config->get("app.Cruise.webservices.{$parameters['webservice']}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getComponents($parameters);
    }

    /**
     * Implementation of the Bookable contract's getAvailableCategories method.
     *
     * Calls on the service API cruise getAvailableCategories.
     *
     * @param array $parameters
     * @return object
     */
    public function getAvailableCategories($parameters = [])
    {
        $webserviceName = $this->config->get("app.Cruise.webservices.{$parameters['webservice']}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getAvailableCategories($parameters);
    }

    /**
     * Implementation of the Bookable contract's getCabins method.
     *
     * Calls on the service API cruise getCabins.
     *
     * @param array $parameters
     * @return object
     */
    public function getCabins($parameters = [])
    {
        $webserviceName = $this->config->get("app.Cruise.webservices.{$parameters['webservice']}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->getCabins($parameters);
    }

    /**
     * Implementation of the Bookable contract's getQuote method.
     *
     * Calls on the service API cruise getQuote.
     *
     * @param array $parameters
     * @return object
     */
    public function getQuote($parameters = [])
    {

    }

    /**
     * Implementation of the Bookable contract's holdCabin method.
     *
     * Calls on the service API cruise holdCabin.
     *
     * @param array $parameters
     * @return object
     */
    public function holdCabin($parameters = [])
    {
        $webserviceName = $this->config->get("app.Cruise.webservices.{$parameters['webservice']}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->holdCabin($parameters);
    }

    /**
     * Implementation of the Bookable contract's book method.
     *
     * Calls on the service API cruise book.
     *
     * @param array $parameters
     * @return object
     */
    public function book($parameters = [])
    {
        $webserviceName = $this->config->get("app.Cruise.webservices.{$parameters['webservice']}");

        $webserviceClass = "\\SmsOrange\\Cruise\\$webserviceName";

        $ws = new $webserviceClass($this->apiUrl, $this->apiParams);

        return $ws->book($parameters);
    }

}
