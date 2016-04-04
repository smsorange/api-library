<?php
namespace SmsOrange;

/**
 * Interface Bookable
 *
 * A contract for all booking services.
 *
 * @package SmsOrange
 */
interface Bookable
{
    /**
     * Query service step - search
     *
     * @return mixed as defined in implementation
     */
    public function search();

    /**
     * Selection step - choose package
     *
     * @return mixed
     */
    public function select();

    /**
     * Get cabins step - choose cabin
     *
     * @return mixed
     */
    public function getCabins();

    /**
     * Book step - book selected package
     *
     * @return mixed
     */
    public function book();
}