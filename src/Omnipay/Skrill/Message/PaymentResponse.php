<?php
namespace Omnipay\Skrill\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Skrill Payment Response
 *
 * This is the associated response to our PaymentRequest where we get Skrill's session,
 * and thus the URL to where we shall redirect users to the payment page.
 *
 * @author Joao Dias <joao.dias@cherrygroup.com>
 * @version 6.19 Merchant Integration Manual
 */
class PaymentResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Is the response successful?
     *
     * @return boolean is successful
     */
    public function isSuccessful()
    {
        return false;
    }

    /**
     * Does the response require a redirect?
     *
     * @return boolean is redirect
     */
    public function isRedirect()
    {
        return $this->getSessionId() !== null;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string redirect url
     */
    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint() . '?sid=' . $this->getSessionId();
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string redirect method
     */
    public function getRedirectMethod()
    {
        return 'GET';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array redirect data
     */
    public function getRedirectData()
    {
        return null;
    }

    /**
     * Get the session identifier to be submitted at the next step.
     *
     * @return string session id
     */
    public function getSessionId()
    {
        return preg_match('~SESSION_ID=([0-9a-fA-F]+)~', $this->data->getSetCookie(), $matches)
            ? $matches[1]
            : null;
    }

    /**
     * Get the skrill status of this response.
     *
     * @return string|null status
     */
    public function getStatus()
    {
        return (string) $this->data->getHeader('X-Skrill-Status');
    }

    /**
     * Get a status code associated with this response.
     *
     * @return string|null status code
     */
    public function getCode()
    {
        $statusTokens = explode(':', $this->getStatus());
        return array_shift($statusTokens) ?: null;
    }

    /**
     * Get a status message associated with this response.
     *
     * @return string|null status message
     */
    public function getMessage()
    {
        $statusTokens = explode(':', $this->getStatus());
        return array_pop($statusTokens) ?: null;
    }
}
