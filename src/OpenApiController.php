<?php

namespace Thursdaybw\Pokecard;

use Symfony\Component\HttpFoundation\Response;

class OpenApiController
{
    public function __invoke()
    {
        $spec = <<<YAML
openapi: 3.0.0
info:
  title: Pokémon Card API
  version: 1.0.0
paths:
  /random_card:
    get:
      summary: Get a random Pokémon card
      responses:
        '200':
          description: A random Pokémon card
          content:
            application/json:
              schema:
                type: object
                properties:
                  id:
                    type: string
                  name:
                    type: string
                  imageUrl:
                    type: string
YAML;

        $response = new Response($spec);
        $response->headers->set('Content-Type', 'text/yaml');

        return $response;
    }
}
