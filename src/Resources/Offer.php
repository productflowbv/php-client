<?php

namespace ProductFlow\API\Resources;

class Offer extends Resource
{
    /**
     * @param  string  $sku
     * @return array
     */
    public function show(string $sku)
    {
        return $this->client->request('GET', "product/$sku/offer");
    }

    /**
     * @param  string  $sku
     * @param  array  $attributes
     * @return array
     */
    public function upsert(string $sku, array $attributes)
    {
        return $this->client->request('POST', "product/$sku/offer", ['form_params' => $attributes]);
    }

    /**
     * @param  string  $sku
     * @return array
     */
    public function delete(string $sku)
    {
        return $this->client->request('DELETE', "product/$sku/offer");
    }
}