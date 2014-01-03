<?php
namespace Omnipay\Skrill\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Skrill Request
 */
abstract class Request extends AbstractRequest
{
    /**
     * Get the endpoint for this request.
     * @return string endpoint
     */
    abstract protected function getEndpoint();

    /**
     * Get the action name for this request.
     * @return string action name
     */
    abstract protected function getAction();

    /**
     * Get the data for this request.
     * @return array request data
     */
    public function getData()
    {
        $data['action'] = $this->getAction();

        return $data;
    }

    /**
     * Send the skrill request.
     * @return AbstractResponse
     */
    public function sendData($data)
    {
        $url = $this->getEndpoint() . '?' . http_build_query($data);
        $httpResponse = $this->httpClient->get($url)->send();

        $xml = $httpResponse->xml();
        return $this->createResponse($xml);
    }

    /**
     * Create a proper response based on the request.
     * @param  \SimpleXMLElement  $xml  raw response
     * @return AbstractResponse         response object for this request
     */
    protected function createResponse($xml)
    {
        $requestClass = get_class($this);
        $responseClass = substr($requestClass, 0, -7) . 'Response';
        return $this->response = new $responseClass($this, $xml);
    }
}
