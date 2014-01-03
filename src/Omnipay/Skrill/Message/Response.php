<?php
namespace Omnipay\Skrill\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Skrill Response
 */
abstract class Response extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return !isset($this->data->error);
    }

    /**
     * Get the error message if the response isn't successful.
     *
     * @return string error message
     */
    public function getMessage()
    {
        return $this->isSuccessful()
            ? null
            : (string) $this->data->error->error_msg;
    }
}
