<?php
namespace Omnipay\Skrill;

use Omnipay\Common\AbstractGateway;
use Omnipay\Skrill\Message\PrepareRequest;

/**
 * Skrill Gateway
 */
class Gateway extends AbstractGateway
{
    const API_VERSION = '2.11'; // 2012-01-25

    public function getName()
    {
        return 'Skrill';
    }

    public function getDefaultParameters()
    {
        return array(
            'email'    => '',
            'testMode' => false,
        );
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    public function getStatusUrl()
    {
        return $this->getParameter('statusUrl');
    }

    public function setStatusUrl($value)
    {
        return $this->setParameter('statusUrl', $value);
    }

    public function preparePayment(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Skrill\Message\PaymentRequest', $parameters);
    }

    /**
     * @see GatewayInterface::purchase()
     */
    public function purchase(array $parameters = array())
    {
        return $this->preparePayment($parameters);
    }

    /**
     * Authorisation and Preparation of the Payment
     * @param  array  $parameters request parameters
     * @return mixed              response
     */
    public function prepare(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Skrill\Message\PrepareRequest', $parameters);
    }

    /**
     * Execution of the Transfer
     * @param  array  $parameters request parameters
     * @return mixed              response
     */
    public function transfer(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Skrill\Message\TransferRequest', $parameters);
    }

    /**
     * Authorise and prepare a refund.
     * @param  array                  $parameters  refund parameters
     * @return RefundPrepareResponse               response
     */
    public function prepareRefund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Skrill\Message\RefundPrepareRequest', $parameters);
    }
}
