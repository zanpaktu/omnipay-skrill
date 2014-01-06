<?php
namespace Omnipay\Skrill;

use Omnipay\Common\AbstractGateway;

/**
 * Skrill Gateway
 */
class Gateway extends AbstractGateway
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Skrill';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultParameters()
    {
        return array(
            'email'     => '',
            'statusUrl' => '',
            'testMode'  => false,
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

    /**
     * {@inheritdoc}
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('Omnipay\Skrill\Message\PaymentRequest', $parameters);
    }

    /**
     * Authorize and prepare a transfer.
     *
     * @param  array                             $parameters  request parameters
     * @return Message\AuthorizeTransferRequest               response
     */
    public function authorizeTransfer(array $parameters = array())
    {
        return $this->createRequest('Omnipay\Skrill\Message\AuthorizeTransferRequest', $parameters);
    }

    /**
     * Execution of the Transfer.
     *
     * @param  array  $parameters request parameters
     * @return mixed              response
     */
    public function transfer(array $parameters = array())
    {
        return $this->createRequest('Omnipay\Skrill\Message\TransferRequest', $parameters);
    }

    /**
     * Authorize and prepare a refund.
     *
     * @param  array                  $parameters  refund parameters
     * @return RefundPrepareResponse               response
     */
    public function prepareRefund(array $parameters = array())
    {
        return $this->createRequest('Omnipay\Skrill\Message\RefundPrepareRequest', $parameters);
    }
}
