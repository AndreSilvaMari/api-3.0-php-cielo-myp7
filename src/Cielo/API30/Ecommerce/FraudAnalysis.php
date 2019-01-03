<?php

namespace Cielo\API30\Ecommerce;
/**
 * Class Payment
 *
 * @package Cielo\API30\Ecommerce
 */
class FraudAnalysis implements \JsonSerializable
{
    private $sequence;

    private $sequenceCriteria;

    private $fingerPrintId;

    private $totalOrderAmount;

    private $browser;

    private $cart;

    public $replyData;

    //private $merchantDefinedFields;

    //private $shipping;

    //private $travel;

    public function __construct($totalOrderAmount = null, $fingerPrintId = null)
    {
        $this->setSequence('AuthorizeFirst');
        $this->setSequenceCriteria('OnSuccess');
        $this->setTotalOrderAmount($totalOrderAmount);
        $this->setFingerPrintId($fingerPrintId);
    }

    public function populate(\stdClass $data)
    {
        $dataProps = get_object_vars($data);

        if (isset($dataProps['Browser'])) {
            $this->browser = new Browser($data->Browser);
            $this->browser->populate($data->Browser);
        }

        if (isset($dataProps['Cart'])) {
            $this->cart = new Cart($data->Cart);
            $this->cart->populate($data->Cart);
        }

        if (isset($dataProps['MerchantDefinedFields'])) {
            $this->merchantDefinedFields = new MerchantDefinedFields();
            $this->merchantDefinedFields->populate($data->MerchantDefinedFields);
        }

        if (isset($dataProps['Shipping'])) {
            $this->shipping = new ShippingBilling();
            $this->shipping->populate($data->Shipping);
        }

        if (isset($dataProps['Travel'])) {
            $this->travel = new Travel();
            $this->travel->populate($data->Travel);
        }

        if (isset($dataProps['FingerPrintId'])) {
            $this->fingerPrintId = $dataProps['FingerPrintId'];
        }

        if (isset($dataProps['ReplyData'])) {
            $this->replyData = $dataProps['ReplyData'];
        }
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function browser($browserData)
    {
        $newBrowser = new Browser($browserData);

        $this->setBrowser($newBrowser);

        return $newBrowser;
    }

    public function cart($cartData)
    {
        $newCart = new Cart($cartData);

        $this->setCart($newCart);

        return $newCart;
    }

    public function merchantDefinedFields()
    {
        $newMerchantDefinedFields = new MerchantDefinedFields();

        $this->setMerchantDefinedFields($newMerchantDefinedFields);

        return $newMerchantDefinedFields;
    }

    public function shipping($addressee, $method, $phone)
    {
        $newShippingBilling = new ShippingBilling($addressee, $method, $phone);

        $this->setShippingBilling($newShippingBilling);

        return $newShippingBilling;
    }

/*    public function travel($departureTime, $journeyType, $route, $legs)
    {
        $newTravel = new Travel($departureTime, $journeyType, $route, $legs);

        $this->setTravel($newTravel);

        return $newTravel;
    }
*/
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;

        return $this;
    }

    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;

        return $this;
    }

    public function setFingerPrintId($fingerPrintId)
    {
        $this->fingerPrintId = $fingerPrintId;

        return $this;
    }


    public function setTotalOrderAmount($totalOrderAmount)
    {
        $this->totalOrderAmount = $totalOrderAmount;

        return $this;
    }

    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

}
