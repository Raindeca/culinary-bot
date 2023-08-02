<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use GuzzleHttp\Client;

class SearchCommand extends Command
{
    protected string $name = 'search';
    protected string $pattern = '{location: (?<=\/search\s)(.+)}';
    protected string $description = 'Search Command to get you started';

    public function handle()
    {
        $apiKey = env('YELP_FUSION_API_TOKEN');
        $location = $this->argument('location');
        $limit = 3;

        $client = new \GuzzleHttp\Client();

        // Make a request to the Yelp Fusion API
        $url = "https://api.yelp.com/v3/businesses/search?term=food&location={$location}&limit={$limit}";
        $headers = [
            'Authorization' => "Bearer {$apiKey}",
            'Content-Type' => 'application/json',
        ];

        try {
            $response = $client->get($url, ['headers' => $headers]);
            $data = json_decode($response->getBody(), true);

            // Process the API response to extract the restaurant information
            $restaurants = $data['businesses'] ?? [];

            if (empty($restaurants)) {
                return $this->replyWithMessage([
                    'text' => 'No Restaurants Nearby'
                ]);
            }

            // Build the response message with restaurant information
            $message = "Nearby Restaurants:\n";
            foreach ($restaurants as $restaurant) {
                $name = $restaurant['name'];
                $rating = $restaurant['rating'];
                $address = $restaurant['location']['address1'];

                $message .= "Name: {$name}\nRating: {$rating}\nLocation: {$address}\n\n";
            }

            return $this->replyWithMessage([
                'text' => $message
            ]);

        } catch (\Exception $e) {
            return 'Error fetching data from Yelp API.';
        }



        // $this->replyWithMessage([
        //     'text' => "Hello {$location}! Welcome to our bot :)"
        // ]);
    }
}