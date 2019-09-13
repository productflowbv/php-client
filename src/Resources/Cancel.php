<?php

namespace ProductFlow\API\Resources;

class Cancel extends Resource
{

    /**
     * @param  string  $identifier
     * @return array
     */
    public function list(string $identifier)
    {
        return $this->client->request('GET', "order/{$identifier}/cancel");
    }

    /**
     * @param $identifier
     * @param  array  $attributes
     * @return array
     */
    public function create(string $identifier, array $attributes)
    {
        return $this->client->request('POST', "order/{$identifier}/cancel", ['form_params' => $attributes]);
    }
}