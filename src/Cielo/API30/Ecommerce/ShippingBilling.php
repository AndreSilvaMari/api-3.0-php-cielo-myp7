<?php

namespace Cielo\API30\Ecommerce;
/**
 * Class ShippingBilling
 *
 * @package Cielo\API30\Ecommerce
 */
class ShippingBilling implements \JsonSerializable
{
    private $addresse;

    private $method;

    private $phone;

    public function __construct()
    {
//        $this->setAddresse($addresse);
//        $this->setMethod($method);
//        $this->setPhone($phone);
    }

    public function populate(\stdClass $data)
    {
        $this->addresse = isset($data->addresse) ? $data->addresse : null;
        $this->method   = isset($data->method) ? $data->method : null;
        $this->phone    = isset($data->phone) ? $data->phone : null;
    }

    public function setAddreesse($addresse)
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}