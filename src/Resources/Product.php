<?php

namespace ProductFlow\API\Resources;

class Product extends Resource
{
    /**
     * @var string
     */
    protected $locale = 'en';

    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', "product", $this->getHeaders() + ['query' => ['page' => $this->getPage()]]);
    }

    /**
     * @param  string  $sku
     * @return array
     */
    public function show(string $sku)
    {
        return $this->client->request('GET', "product/$sku", $this->getHeaders());
    }

    /**
     * @param  string  $sku
     * @param  array  $attributes
     * @return array
     */
    public function upsert(string $sku, array $attributes)
    {
        return $this->client->request('POST', "product/$sku", $this->getHeaders() + ['form_params' => $attributes]);
    }

    /**
     * @param  string  $sku
     * @return array
     */
    public function delete(string $sku)
    {
        return $this->client->request('DELETE', "product/$sku", $this->getHeaders());
    }

    /**
     * @param  string  $locale
     * @return $this
     */
    public function setLocale(string $locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return array
     */
    private function getHeaders()
    {
        return [
            'headers' => ['Accept-Language' => $this->locale]
        ];
    }
}