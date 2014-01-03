<?php
namespace Omnipay\Skrill\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Skrill Refund Prepare Request
 */
class RefundPrepareRequest extends AuthRequest
{
    /**
     * Get the endpoint for this request.
     * @return string endpoint
     */
    protected function getEndpoint()
    {
        return 'https://www.moneybookers.com/app/refund.pl';
    }

    /**
     * Get the action name for this request.
     * @return string action name
     */
    protected function getAction()
    {
        return 'prepare';
    }

    /**
     * Get the Skrill (Moneybookers) transaction ID to be refunded.
     * @return string transaction id
     */
    public function getSkrillTransactionId()
    {
        return $this->getParameter('skrillTransactionId');
    }

    /**
     * Set the Skrill (Moneybookers) transaction ID to be refunded.
     * @param string $value transaction id
     */
    public function setSkrillTransactionId($value)
    {
        return $this->setParameter('skrillTransactionId', $value);
    }

    /**
     * Get the explanation for the refund.
     * @return string note
     */
    public function getNote()
    {
        return $this->getParameter('note');
    }

    /**
     * Set the explanation for the refund.
     * @param string $value note
     */
    public function setNote($value)
    {
        return $this->setParameter('note', $value);
    }

    /**
     * Get the URL or email address to which updated status should be sent.
     * @return string url or email
     */
    public function getStatusUrl()
    {
        return $this->getParameter('statusUrl');
    }

    /**
     * Set the URL or email address to which updated status should be sent.
     * @param string $value url or email
     */
    public function setStatusUrl($value)
    {
        return $this->setParameter('statusUrl', $value);
    }

    /**
     * Get the list of fields that should be passed back to the Merchant's
     * server when the refund payment is confirmed. (maximum 5 fields)
     * @return array merchant fields
     */
    public function getMerchantFields()
    {
        return $this->getParameter('merchantFields');
    }

    /**
     * Set the list of fields that should be passed back to the Merchant's
     * server when the refund payment is confirmed. (maximum 5 fields)
     * @param array $value merchant fields
     */
    public function setMerchantFields($value)
    {
        return $this->setParameter('merchantFields', $value);
    }

    /**
     * Get the data for this request.
     * @return array request data
     */
    public function getData()
    {
        // make sure we have a (skrill) transaction id
        $transactionId = $this->getTransactionId();
        $skrillTransactionId = $this->getSkrillTransactionId();
        if (empty($transactionId) && empty($skrillTransactionId)) {
            throw new InvalidRequestException('Either transactionId or skrillTransactionId is required');
        }

        $data = parent::getData();
        $data['transaction_id'] = $transactionId;
        $data['mb_transaction_id'] = $skrillTransactionId;
        $data['amount'] = $this->getAmount();
        $data['refund_note'] = $this->getNote();
        $data['refund_status_url'] = $this->getStatusUrl();

        // merchant fields
        $merchantFields = $this->getMerchantFields();
        $data['merchant_fields'] = implode(',', array_keys($merchantFields));
        foreach ($merchantFields as $key => $value) {
            $data[$key] = $value;
        }

        return $data;
    }

    /**
     * Create the prepare response for this request.
     * @param  \SimpleXMLElement  $xml  raw response
     * @return PrepareResponse          response object for this request
     */
    protected function createResponse($xml)
    {
        return $this->response = new PrepareResponse($this, $xml);
    }
}
