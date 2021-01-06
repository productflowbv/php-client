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
        return $this->client->request('GET', 'order', ['query' => $this->getQuery() + ['status' => $status]]);
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

    /**
     * @param $identifier
     * @param bool $file True if you want to have the PDF file returned.
     * @return array
     */
    public function picking($identifier, $file = false)
    {
        $options = $file ? ['headers' => ['accept' => 'application/pdf']] : [];

        return $this->client->request('GET', "order/{$identifier}/picking", $options);
    }

}