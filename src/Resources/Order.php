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
        $this->filter('status', 'in', $status);

        return $this->client->request('GET', 'order', ['query' => $this->getQuery()]);
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
        return $this->client->request('PUT', "order/{$identifier}/accept");
    }
}