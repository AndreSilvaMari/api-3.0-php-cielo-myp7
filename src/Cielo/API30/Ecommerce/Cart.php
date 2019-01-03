<?php

namespace Cielo\API30\Ecommerce;
/**
 * Class Payment
 *
 * @package Cielo\API30\Ecommerce
 */
class Cart implements \JsonSerializable
{
    private $isGift;

    private $returnsAccepted;

    private $items;

    public function __construct($cartData)
    {
        $cartData = (array) $cartData;
        $this->setIsGift($cartData['IsGift']);
        $this->setReturnsAccepted($cartData['ReturnsAccepted']);
        $this->setItems($cartData['Items']);
    }

    public function populate(\stdClass $data)
    {
        $this->isGift              = isset($data->isGift) ? $data->isGift : null;
        $this->returnsAccepted     = isset($data->returnsAccepted) ? $data->returnsAccepted : null;
        $this->items               = isset($data->items) ? $data->items : null;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setIsGift($isGift)
    {
        $this->isGift = $isGift;

        return $this;
    }

    public function setReturnsAccepted($returnsAccepted)
    {
        $this->returnsAccepted = $returnsAccepted;

        return $this;
    }

    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }
}
