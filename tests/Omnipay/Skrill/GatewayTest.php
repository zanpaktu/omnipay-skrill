<?php
namespace Omnipay\Skrill;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
        $this->gateway->setEmail('test@php.unit');
        $this->gateway->setPassword('password');

        $this->purchaseOptions = array(
            'language' => 'EN',
            'amount' => '12.34',
            'currency' => 'EUR',
            'details' => array('item' => 'item description'),
        );

        $this->transferOptions = array(
            'amount' => $this->purchaseOptions['amount'],
            'currency' => $this->purchaseOptions['currency'],
            'subject' => 'subject',
            'note' => 'note',
            'customerEmail' => 'customer@php.unit',
        );
    }

    public function testPurchaseSuccess()
    {
        $this->setMockHttpResponse('PaymentRequestSuccess.txt');
        $expectedSessionId = '161c218567ebcd8dd1dbda595a26a86f';

        $request = $this->gateway->purchase($this->purchaseOptions);
        $response = $request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertSame($expectedSessionId, $response->getSessionId());
        $this->assertTrue($response->isRedirect());
        $this->assertSame($request->getEndpoint() . '?sid=' . $expectedSessionId, $response->getRedirectUrl());
        $this->assertSame('GET', $response->getRedirectMethod());
        $this->assertNull($response->getRedirectData());

        $this->assertSame('::::::', $response->getStatus());
        $this->assertNull($response->getCode());
        $this->assertNull($response->getMessage());
    }

    public function testPurchaseInvalidMerchant()
    {
        $this->setMockHttpResponse('PaymentRequestFailure.txt');
        $expectedSessionId = 'dc5299845857f51770334e0b03c4df02';

        $request = $this->gateway->purchase($this->purchaseOptions);
        $response = $request->send();

        $this->assertFalse($response->isSuccessful());
        $this->assertSame($expectedSessionId, $response->getSessionId());
        $this->assertTrue($response->isRedirect());
        $this->assertSame($request->getEndpoint() . '?sid=' . $expectedSessionId, $response->getRedirectUrl());
        $this->assertSame('GET', $response->getRedirectMethod());
        $this->assertNull($response->getRedirectData());

        $this->assertSame('error::::ERROR::INVALID_MERCHANT', $response->getStatus());
        $this->assertSame('error', $response->getCode());
        $this->assertSame('INVALID_MERCHANT', $response->getMessage());
    }

    public function testAuthorizeTransferSuccess()
    {
        $this->setMockHttpResponse('AuthorizeSuccess.txt');

        $request = $this->gateway->authorizeTransfer($this->transferOptions);
        $response = $request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertSame('761d416b605f1d438326b890025ad562', $response->getSessionId());
        $this->assertNull($response->getCode());
        $this->assertNull($response->getMessage());
    }
}
