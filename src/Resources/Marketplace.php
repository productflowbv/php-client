<?php

namespace ProductFlow\API\Resources;

use UnexpectedValueException;

class Marketplace extends Resource
{
    /**
     * @var array
     */
    protected $allowed_functionality = ['orders', 'offers', 'content'];

    /**
     * @param  string|null  $supports
     * @param  string|null  $enabled
     * @return array
     */
    public function list(string $supports = null, string $enabled = null)
    {
        if (!is_null($supports) && !in_array($supports, $this->allowed_functionality)) {
            throw new UnexpectedValueException("'$supports' is not a valid option");
        }
        if (!is_null($enabled) && !in_array($enabled, $this->allowed_functionality)) {
            throw new UnexpectedValueException("'$enabled' is not a valid option");
        }

        return $this->client->request('GET', 'marketplace', [
            'query' => array_filter([
                'supports' => $supports,
                'enabled' => $enabled
            ])
        ]);
    }
}