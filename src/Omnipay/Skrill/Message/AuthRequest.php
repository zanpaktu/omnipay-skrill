<?php
namespace Omnipay\Skrill\Message;

/**
 * Skrill Auth Request
 */
abstract class AuthRequest extends Request
{
    /**
     * Get the email address of the merchant.
     * @return string email
     */
    public function getEmail()
    {
        return $this->getParameter('email');
    }

    /**
     * Set the email address of the merchant.
     * @param string $value email
     */
    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    /**
     * Get the MD5 of merchant's API password.
     * @return string password
     */
    public function getPassword()
    {
        return $this->getParameter('password');
    }

    /**
     * Set the MD5 of merchant's API password.
     * @param string $value password
     */
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * Get the data for this request.
     * @return array request data
     */
    public function getData()
    {
        // make sure we have the mandatory fields
        $this->validate('email', 'password');

        $data = parent::getData();
        $data['email'] = $this->getEmail();
        $data['password'] = $this->getPassword();

        return $data;
    }
}
