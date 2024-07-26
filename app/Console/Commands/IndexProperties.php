<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;
use App\Models\Property;

class IndexProperties extends Command
{
    protected $signature = 'index:properties';
    protected $description = 'Index all properties to Elasticsearch';

    protected $client;

    public function __construct()
    {
        parent::__construct();

        $this->client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->setBasicAuthentication('elastic', 'aQ6q5PJwbwZtcWuAcCNs')
            ->build();
    }

    public function handle()
    {
        $this->info('Starting re-indexing process...');

        $properties = Property::with('details', 'user', 'images')->get();

        foreach ($properties as $property) {
            $params = [
                'index' => 'properties',
                'id'    => $property->id,
                'body'  => [
                    'user' => [
                        'id'   => $property->user->id,
                        'name' => $property->user->name,
                    ],
                    'images' => $property->images->pluck('image')->toArray(),
                    'title' => $property->title,
                    'price' => $property->price,
                    'type' => $property->type,
                    'address' => $property->address,
                    'created_at' => Carbon::parse($property->created_at)->toDateTimeString(),
                    'area' => $property->area,
                    'status' => $property->status,
                    'building_age' => $property->details->building_age,
                    'bedrooms' => $property->details->bedrooms,
                    'bathrooms' => $property->details->bathrooms,
                    'rooms' => $property->rooms,
                    'air_conditioning' => $property->details->air_conditioning,
                    'swimming_pool' => $property->details->swimming_pool,
                    'central_heating' => $property->details->central_heating,
                    'laundry_room' => $property->details->laundry_room,
                    'gym' => $property->details->gym,
                    'alarm' => $property->details->alarm,
                    'window_covering' => $property->details->window_covering,
                ],
            ];

            $this->client->index($params);
        }

        $this->info('Re-indexing process completed.');
    }
}
