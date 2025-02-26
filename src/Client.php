<?php

namespace ProductFlow\API;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\ClientInterface;

class Client
{
    /**
     * @var string
     */
    protected $baseUrl = 'https://cloud.productflow.com/api/v1/';

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Client constructor.
     * @param  int  $companyId
     * @param  string  $secret
     */
    public function __construct(int $companyId, string $secret)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$secret,
                'X-Company-Id' => $companyId
            ]
        ]);
    }

    /**
     * Use own custom client. This can be useful for testing, additional logging, setting custom user agent etc.
     *
     * @param ClientInterface $client
     * @return $this
     */
    public function useClient(ClientInterface $client) : self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param  array  $options
     * @return array|string Array if the response was JSON, raw response body otherwise.
     * @throws GuzzleException
     */
    public function request(string $method, string $uri, array $options = [])
    {
        $response = $this->client->request($method, $uri, $options);

        $response->getBody()->rewind();
        $contents = $response->getBody()->getContents();

        // fallback to application/json as this is, apart from 1 call, the return type
        $default = 'application/json';
        if (($response->getHeader('Content-Type')[0] ?? $default)  === 'application/json') {
            $array = json_decode($contents, true);

            return (array) $array;
        }
        else {
            return $contents;
        }
    }
}