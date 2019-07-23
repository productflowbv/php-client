<?php

namespace ProductFlow\API;

use GuzzleHttp\Client as GuzzleClient;
use ProductFlow\API\Exceptions\ProductFlowException;

class Client
{
    /**
     * @var string
     */
    protected $baseUrl = 'http://cloud.productflow.com/api/v1/';

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
     * @param $method
     * @param $uri
     * @param  array  $options
     * @return array
     */
    public function request(string $method, string $uri, array $options = [])
    {
        $response = $this->client->request($method, $uri, $options);

        $contents = $response->getBody()->getContents();

        $array = json_decode($contents, true);

        return (array) $array;
    }
}