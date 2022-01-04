<?php
namespace App\Search;

use Search\Searchable;

class ShopsSearch extends Searchable
{
    public function __construct()
    {
        $this->shops = [
            'name' => [
                'type' => 'like'
            ],
            'area' => [
                'type' => 'value'
            ],
            'genre' => [
                'type' => 'value'
            ],
        ];
    }
}
