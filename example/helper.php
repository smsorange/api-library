<?php

/*
|--------------------------------------------------------------------------
| Helper functions used in the API example application
|--------------------------------------------------------------------------
*/

/**
 * Renders and returns the requested view.
 *
 * @param string $strViewPath
 * @param array $arrayOfData
 * @param string $containerName name of the variable holding the data in the view
 * @return string rendered view
 */
function loadView($strViewPath, $arrayOfData, $containerName)
{
    extract($arrayOfData);

    $$containerName = $arrayOfData;

    $num = count($$containerName);

    ob_start();
    require(__DIR__ . '/partials/' . $strViewPath);
    $strView = ob_get_contents();
    ob_end_clean();

    return $strView;
}

/**
 * Renders the var_dump() output as view.
 *
 * @param array|object $mixed
 * @return string contents of var_dump()
 */
function varDumpToString($mixed = null)
{
    ob_start();
    var_dump($mixed);
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
}

/**
 * Return prices info structured for booking view
 * @param $booking_details
 * @return array
 */
function getPricesInfo($booking_details)
{
    $prices = [];

    foreach ($booking_details->Prices->Price as $price) {
        if ($price->Type == 'Guest' && (int)$price->GuestSequenceNumber > 0) {
            $prices['guests'][$price->GuestSequenceNumber][$price->Code] = $price;
        } // if
        if ($price->Type == 'Guest' && (int)$price->GuestSequenceNumber == 0) {
            $prices['guests_total'][$price->Code] = $price;
        } // if

        if ($price->Type == 'Agent' && (int)$price->GuestSequenceNumber == 0) {
            $prices['agent'][$price->Code] = $price;
        } // if

    } // foreach

    return $prices;
} // getPricesInfo
