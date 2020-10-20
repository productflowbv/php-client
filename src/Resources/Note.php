<?php

namespace ProductFlow\API\Resources;

class Note extends Resource
{
    /**
     * @param  string  $identifier
     * @return array
     */
    public function list(string $identifier)
    {
        return $this->client->request('GET', "order/{$identifier}/note");
    }

    /**
     * @param $identifier
     * @param  array  $attributes
     * @return array
     */
    public function create(string $identifier, array $attributes)
    {
        return $this->client->request('POST', "order/{$identifier}/note", ['form_params' => $attributes]);
    }
}