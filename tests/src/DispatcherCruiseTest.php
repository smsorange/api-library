<?php

use SmsOrange\Dispatcher;
use SmsOrange\Cruise;

class DispatcherCruiseTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerTestEachStepReturnsUnirestObject
     */
    public function testEachStepReturnsUnirestObject($step, $params)
    {
        $token = 'test-token';

        $dispatcher = new Dispatcher(new Cruise($token));

        $response = $dispatcher->$step($params);

        $this->assertObjectHasAttribute('code', $response);
        $this->assertObjectHasAttribute('headers', $response);
        $this->assertObjectHasAttribute('body', $response);
        $this->assertObjectHasAttribute('raw_body', $response);
    }

    public function providerTestEachStepReturnsUnirestObject()
    {
        return [
            [
                'search',
                [
                    'data' => 'cruise_data%5Bfrom_date%5D=0&cruise_data%5Bto_date%5D=0&cruise_data%5Bcruises_cruise_line_id%5D=21&cruise_data%5Bdestination_id%5D=&cruise_data%5Bship_code%5D=0&cruise_data%5Bdeparture_port_id%5D=0'
                ]
            ],
            [
                'select',
                [
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice'
                ]
            ],
            [
                'getComponents',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
            [
                'getAvailableCategories',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
            [
                'getCabins',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
            [
                'getQuote',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
            [
                'holdCabin',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
            [
                'book',
                [
                    'webservice' => '21',
                    'data' => 'cruise-code=FA07160314&webservice=CostaCruisesWebservice',
                ]
            ],
        ];
    }
}
