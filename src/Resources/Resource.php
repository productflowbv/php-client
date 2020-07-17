<?php

namespace ProductFlow\API\Resources;

use ProductFlow\API\Client;

abstract class Resource
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var int
     */
    protected $page = 1;

    /**
     * @var array
     */
    protected $sorts = [];

    /**
     * @var array
     */
    protected $filters = [];

    /**
     * Resource constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPage(int $page)
    {
        $this->page = $page;
        return $this;
    }


    /**
     * @param string $column
     * @param $operation
     * @param null $value
     * @return $this
     */
    public function filter(string $column, $operation, $value = null)
    {
        if (is_null($value)) {
            $value = $operation;
            $operation = 'eq';
        }

        $this->filters[$column][$operation] = $value;
        return $this;
    }

    /**
     * @param string $column
     * @param string $direction
     * @return $this
     */
    public function sort(string $column, string $direction = 'asc')
    {
        $this->sorts[$column] = $direction == 'asc' ? "$column" : "-$column";
        return $this;
    }

    /**
     * @return array
     */
    protected function getQuery()
    {
        $query = $this->filters;
        $query['sort'] = array_values($this->sorts);
        $query['page'] = $this->getPage();
        return $query;
    }
}