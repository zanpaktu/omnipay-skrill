<?php
namespace Omnipay\Skrill\Message;

/**
 * Skrill Authorize Transfer Response
 */
class AuthorizeTransferResponse extends Response
{
    /**
     * Get the session identifier to be submitted at the next step.
     * @return string session id
     */
    public function getSessionId()
    {
        return isset($this->data->sid)
            ? (string) $this->data->sid
            : null;
    }
}
