<?php

namespace ProductFlow\API\Resources;

class MarketplaceOffer extends Resource
{
    /**
     * @return array
     */
    public function list()
    {
        return $this->client->request('GET', "marketplace-offer",  ['query' => ['per_page' => $this->getPerPage(), 'page' => $this->getPage()]]);
    }

    /**
     * @param  string  $sku
     * @return array
     */
    public function show(string $sku)
    {
        return $this->client->request('GET', "product/$sku/marketplace-offer");
    }

    /**
     * @param  string  $sku
     * @param  array  $attributes
     * @return array
     */
    public function upsert(string $sku, array $attributes)
    {
        return $this->client->request('POST', "product/$sku/marketplace-offer", ['form_params' => $attributes]);
    }
}