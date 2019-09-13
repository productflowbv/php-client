<?php

namespace ProductFlow\API\Resources;

class Order extends Resource
{
    /**
     * @param  array  $status
     * @return array
     */
    public function list(array $status = [])
    {
        return $this->client->request('GET', 'order', ['query' => ['status' => $status]]);
    }

    /**
     * @param $identifier
     * @return array
     */
    public function show($identifier)
    {
        return $this->client->request('GET', "order/{$identifier}");
    }

    /**
     * @param $identifier
     * @return array
     */
    public function accept($identifier)
    {
        return $this->client->request('PUT', "order/{$identifier}");
    }
}