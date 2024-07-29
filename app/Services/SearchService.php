<?php

namespace App\Services;

use Elastic\Elasticsearch\Client;
use Exception;

class SearchService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function searchProperties($request)
    {

        $params = [
            'index' => 'properties',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => $this->clauses($request),
                        'filter' => $this->Filter($request),
                    ],
                ],
            ],
        ];

        try {
            $response = $this->client->search($params);
            return $response['hits']['hits'];
        } catch (Exception $e) {

            \Log::error('Elasticsearch query error: ' . $e->getMessage());
            return [];
        }
    }

    protected function clauses($request)
    {
        $clauses = [];

        if ($request->filled('address')) {
            $clauses[] = [
                'match' => [
                    'address' => $request->input('address'),
                ],
            ];
        }

        if ($request->filled('type')) {
            $clauses[] = [
                'term' => [
                    'type' => (int)$request->input('type'),
                ],
            ];
        }

        return $clauses;
    }

    protected function Filter($request)
    {
        $filters = [];

        if ($request->filled('min_price') || $request->filled('max_price')) {
            $filters[] = [
                'range' => [
                    'price' => [
                        'gte' => $request->input('min_price', 0),
                        'lte' => $request->input('max_price', PHP_INT_MAX),
                    ],
                ],
            ];
        }

        if ($request->filled('min_area') || $request->filled('max_area')) {
            $filters[] = [
                'range' => [
                    'area' => [
                        'gte' => $request->input('min_area', 0),
                        'lte' => $request->input('max_area', PHP_INT_MAX),
                    ],
                ],
            ];
        }

        if ($request->filled('beds')) {
            $filters[] = [
                'term' => [
                    'bedrooms' => $request->input('beds'),
                ],
            ];
        }

        if ($request->filled('baths')) {
            $filters[] = [
                'term' => [
                    'bathrooms' => $request->input('baths'),
                ],
            ];
        }

        $checkboxFilters = [
            'air_conditioning',
            'swimming_pool',
            'central_heating',
            'laundry_room',
            'gym',
            'alarm',
            'window_covering',
        ];

        foreach ($checkboxFilters as $filter) {
            if ($request->has($filter)) {
                $filters[] = [
                    'term' => [
                        'features' => $filter,
                    ],
                ];
            }
        }

        return $filters;
    }
}
