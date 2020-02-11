<?php

namespace ProductFlow\API\Resources;

class Webhook extends Resource
{
    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', "webhook");
    }

    /**
     * @param $identifier
     * @param  array  $attributes
     * @return array
     */
    public function create(array $attributes)
    {
        return $this->client->request('POST', "webhook", ['form_params' => $attributes]);
    }

    /**
     * @param string $uuid
     * @param  array  $attributes
     * @return array
     */
    public function delete(string $uuid)
    {
        return $this->client->request('DELETE', "webhook/{$uuid}");
    }
}