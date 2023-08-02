<?php

namespace Thursdaybw\Pokecard;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class RandomCardController
{
    public function __invoke(Request $request)
    {
        // List of valid card IDs
        $valid_card_ids = ['xy7-10', 'swsh4-175', 'xy7-4', 'dp6-107'];

        // Select a random card ID from the list
        $random_card_id = $valid_card_ids[array_rand($valid_card_ids)];

        $client = new Client();
        $res = $client->request('GET', "https://api.pokemontcg.io/v1/cards/{$random_card_id}");
        $card = json_decode($res->getBody(), true)['card'];

        // Create a new object with only the properties we want
        $cardData = [
            'id' => $card['id'],
            'name' => $card['name'],
            'imageUrl' => $card['imageUrl']
        ];

        return new Response(json_encode($cardData));
    }
}
