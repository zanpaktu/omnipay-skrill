<?php
namespace Omnipay\Skrill\Message;

/**
 * Skrill Transfer Request
 */
class TransferRequest extends Request
{
    /**
     * Get the endpoint for this request.
     * @return string endpoint
     */
    protected function getEndpoint()
    {
        return 'https://www.moneybookers.com/app/pay.pl';
    }

    /**
     * Get the action name for this request.
     * @return string action name
     */
    protected function getAction()
    {
        return 'transfer';
    }

    /**
     * Get the session identifier from the previous step.
     * @return string session id
     */
    public function getSessionId()
    {
        return $this->getParameter('sessionId');
    }

    /**
     * Set the session identifier from the previous step.
     * @param string $value session id
     */
    public function setSessionId($value)
    {
        return $this->setParameter('sessionId', $value);
    }

    /**
     * Get the data for this request.
     * @return array request data
     */
    public function getData()
    {
        // make sure we have the mandatory fields
        $this->validate('sessionId');

        $data = parent::getData();
        $data['sid'] = $this->getSessionId();

        return $data;
    }
}
