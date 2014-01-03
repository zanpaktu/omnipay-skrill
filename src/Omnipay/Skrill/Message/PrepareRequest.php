<?php
namespace Omnipay\Skrill\Message;

/**
 * Skrill Prepare Request
 */
class PrepareRequest extends AuthRequest
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
        return 'prepare';
    }

    /**
     * Get the subject of the notification email.
     * Example: Your order is ready
     * @return string subject
     */
    public function getSubject()
    {
        return $this->getParameter('subject');
    }

    /**
     * Set the subject of the notification email.
     * Example: Your order is ready
     * @param string $value subject
     */
    public function setSubject($value)
    {
        return $this->setParameter('subject', $value);
    }

    /**
     * Get the note to be included in the notification email.
     * Example: Details are available at our site...
     * @return string note
     */
    public function getNote()
    {
        return $this->getParameter('note');
    }

    /**
     * Set the note to be included in the notification email.
     * Example: Details are available at our site...
     * @return string note
     */
    public function setNote($value)
    {
        return $this->setParameter('note', $value);
    }

    /**
     * Get the beneficiary's email address.
     * @return string beneficiary's email
     */
    public function getBeneficiaryEmail()
    {
        return $this->getParameter('beneficiaryEmail');
    }

    /**
     * Set the beneficiary's email address.
     * @return string beneficiary's email
     */
    public function setBeneficiaryEmail($value)
    {
        return $this->setParameter('beneficiaryEmail', $value);
    }

    /**
     * Get the data for this request.
     * @return array request data
     */
    public function getData()
    {
        // make sure we have the mandatory fields
        $this->validate('amount', 'currency', 'subject', 'note', 'beneficiaryEmail');

        $data = parent::getData();
        $data['amount'] = $this->getAmount();
        $data['currency'] = $this->getCurrency();
        $data['subject'] = $this->getSubject();
        $data['note'] = $this->getNote();
        $data['bnf_email'] = $this->getBeneficiaryEmail();
        $data['frn_trn_id'] = $this->getTransactionId();

        return $data;
    }
}
