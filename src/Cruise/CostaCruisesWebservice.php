<?php
namespace SmsOrange\Cruise;

use SmsOrange\Main;

class CostaCruisesWebservice extends Main
{
    private $apiUrl;
    private $apiParams;

    public function __construct($apiUrl, $apiParams)
    {
        parent::__construct();

        $this->apiUrl = $apiUrl;
        $this->apiParams = $apiParams;
    }

    public function getComponents($parameters = false)
    {
        $method = $this->getApiMethod('Cruise', __FUNCTION__);

        parse_str($parameters['data'], $params);

        $selectUrl = 'CostaCruisesWebservice/' . $params['cruise-code'] . '/';

        $body = array_merge($this->apiParams, $params);

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

    public function getAvailableCategories($parameters = false)
    {
        $method = $this->getApiMethod('Cruise', __FUNCTION__);

        parse_str($parameters['data'], $components);

        $selectUrl = 'CostaCruisesWebservice/' . $components['cruise-code'] . '/';

        $params['guests'] = $components['cruise-guests'];

        $params['components'][] = [
            'Type' => 'Cruise',
            'Code' => $components['cruise-code'],
            'Fare' => [
                'Code' => 'IND',
            ],
        ];

        $params['components'][] = $components;

        $body = array_merge($this->apiParams, $params);

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

    public function getCabins($parameters = false)
    {
        $method = $this->getApiMethod('Cruise', __FUNCTION__);

        parse_str($parameters['data'], $components);

        $selectUrl = 'CostaCruisesWebservice/' . $components['cruise-code'] . '/';

        $params['guests'] = $components['cruise-guests'];

        $params['components'][] = [
            'Type' => 'Cruise',
            'Code' => $components['cruise-code'],
            'Fare' => [
                'Code' => 'IND',
            ],
            'Category' => $components['category-code'],
        ];

        $params['components'][] = $components;

        $body = array_merge($this->apiParams, $params);

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

    public function getQuote($parameters = false)
    {

    }

    public function holdCabin($parameters = false)
    {
        $method = $this->getApiMethod('Cruise', __FUNCTION__);

        parse_str($parameters['data'], $components);

        $selectUrl = 'CostaCruisesWebservice/' . $components['cruise-code'] . '/';

        $params['guests'] = $components['cruise-guests'];

        $params['components'][] = [
            'Type' => 'Cruise',
            'Code' => $components['cruise-code'],
            'Fare' => [
                'Code' => 'IND',
            ],
            'Category' => $components['category-code'],
            'Cabin' => $components['cabin_number'],
            'DiningPreference' => $components['dining_preference'],
        ];

        $params['components'][] = $components;

        $pc = array_merge($params, $components);
        $body = array_merge($this->apiParams, $pc);

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

    public function book($parameters = false)
    {
        $method = $this->getApiMethod('Cruise', __FUNCTION__);

        parse_str($parameters['data'], $components);

        $selectUrl = 'CostaCruisesWebservice/' . $components['cruise-code'] . '/';

        $params['guests'] = $components['cruise-guests'];

        $params['components'][] = [
            'Type' => 'Cruise',
            'Code' => $components['cruise-code'],
            'Fare' => [
                'Code' => 'IND',
            ],
            'Category' => $components['category-code'],
            'Cabin' => $components['cabin-code'],
            'DiningPreference' => $components['dining-preference'],
        ];

        $params['components'][] = $components;

        $pc = array_merge($params, $components);
        $body = array_merge($this->apiParams, $pc);

        foreach($body['guest_data'] as $key => $guest){
            $body['client_ids'][$key] = $guest['document_number'];
        }

        $resp = $this->executeRequest($this->apiUrl . $selectUrl, $method, $body);

        return $resp;
    }

}
