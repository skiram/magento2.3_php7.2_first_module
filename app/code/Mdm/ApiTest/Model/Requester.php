<?php
/**
 * Created by PhpStorm.
 * User: skiram
 * Date: 18/09/19
 * Time: 21:25
 */

namespace Mdm\ApiTest\Model;

use Magento\Framework\Serialize\SerializerInterface;
use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;
use Zend\Http\Headers;
use Zend\Http\Request;
use Zend\Http\Response;

class Requester
{
    const TIMEOUT = 250;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * Requester constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string $url
     * @param array|null $params
     * @return Response
     */
    public function get(string $url, array $params = null): Response
    {
        return $this->makeCall('GET', $url, $params);
    }

    /**
     * @param string $url
     * @param array $params
     * @return Response
     */
    public function post(string $url, array $params): Response
    {
        return $this->makeCall('POST', $url, $params);
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|null $params
     * @return Response
     */
    protected function makeCall(string $method, string $url, array $params = null): Response
    {
        $request = $this->initRequest($method, $url, $params);
        $client = $this->getClient();
        $response = $client->send($request);

        return $response;
    }

    /**
     * @return Client
     */
    protected function getClient(): Client
    {
        $client = new Client();
        $options = [
            'adapter' => Curl::class,
            'curloptions' => [CURLOPT_FOLLOWLOCATION => true],
            'maxredirects' => 0,
            'timeout' => self::TIMEOUT
        ];
        $client->setOptions($options);

        return $client;
    }

    /**
     * @return Headers
     */
    protected function getHeaders(): Headers
    {
        $httpHeaders = new Headers();
        $httpHeaders->addHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);

        return $httpHeaders;
    }

    /**
     * @param string $method
     * @param Headers $headers
     * @param string $url
     * @param array|null $params
     * @return Request
     */
    protected function getRequest(string $method, Headers $headers, string $url, array $params = null): Request
    {
        $request = new Request();
        $request->setHeaders($headers);
        if ($method == Request::METHOD_GET && is_array($params)) {
            $url .= '?' . http_build_query($params);
        }
        $request->setUri($url);
        $request->setMethod($method);

        if ($method == Request::METHOD_POST && is_array($params)) {
            $jsonContent = $this->serializer->serialize($params);
            $request->setContent($jsonContent);
        }

        return $request;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array|null $params
     * @return Request
     */
    protected function initRequest(string $method, string $url, array $params = null): Request
    {
        $headers = $this->getHeaders();
        $request = $this->getRequest($method, $headers, $url, $params);

        return $request;
    }
}
