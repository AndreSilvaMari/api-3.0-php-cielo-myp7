<?php
namespace Cielo\API30\Ecommerce;
/**
 * Class MerchantDefinedFields
 *
 * @package Cielo\API30\Ecommerce
 */
class MerchantDefinedFields implements \JsonSerializable
{
    private $id;

    private $value;

    public function setId($id)
    {
        $this->id = $id;

        return $id;
    }

    public function setValue($value)
    {
        $this->value = $value;

        return $value;
    }

    public function populate(\stdClass $data)
    {
        $this->id       = isset($data->id) ? $data->id : null;
        $this->value    = isset($data->value) ? $data->value : null;
    }

}