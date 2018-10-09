<?php

namespace Cielo\API30\Ecommerce;
/**
 * Class Travel
 *
 * @package Cielo\API30\Ecommerce
 */
class Travel implements \JsonSerializable
{
    private $departureTime;

    private $journeyType;

    private $route;

    private $legs;

    public function __construct()
    {
//        $this->setDepartureTime($departureTime);
//        $this->setJourneyType($journeyType);
//        $this->setRoute($route);
//        $this->setLegs($legs);
    }

    public function populate(\stdClass $data)
    {
        $this->departureTime    = isset($data->departureTime) ? $data->departureTime : null;
        $this->journeyType      = isset($data->journeyType) ? $data->journeyType : null;
        $this->route            = isset($data->route) ? $data->route : null;
        $this->legs             = isset($data->legs) ? $data->legs : null;
    }

    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    public function setJourneyType($journeyType)
    {
        $this->journeyType = $journeyType;

        return $this;
    }

    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    public function setLegs($legs)
    {
        $this->legs = $legs;

        return $this;
    }
}