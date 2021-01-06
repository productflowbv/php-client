<?php

namespace ProductFlow\API;

use GuzzleHttp\Client as GuzzleClient;
use ProductFlow\API\Exceptions\ProductFlowException;

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
     * @param string $method
     * @param string $uri
     * @param  array  $options
     * @return array|string Array if the response was JSON, raw response body otherwise.
     */
    public function request(string $method, string $uri, array $options = [])
    {
        $response = $this->client->request($method, $uri, $options);

        $contents = $response->getBody()->getContents();

        if ($response->getHeader('Content-Type') === 'application/json') {
            $array = json_decode($contents, true);

            return (array) $array;
        }
        else {
            return $contents;
        }
    }
}