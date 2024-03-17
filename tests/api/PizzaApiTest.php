<?php
namespace App\Tests\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PizzaApiTest extends WebTestCase
{
    public function testCrudOperations(): void
    {
        $client = static::createClient();

        // Crea una nueva pizza
        $client->request('POST', '/api/pizzas', [], [], ['CONTENT_TYPE' => 'application/json'], '{"name": "Pizza Test", "ingredients": ["Ingredient 1", "Ingredient 2"], "ovenTimeInSeconds": 600, "special": false}');
        $this->assertEquals(201, $client->getResponse()->getStatusCode());
        $pizzaId = json_decode($client->getResponse()->getContent(), true)['id'];

        // Obtiene la pizza recién creada
        $client->request('GET', '/api/pizzas/' . $pizzaId);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Actualiza la pizza
        $client->request('PUT', '/api/pizzas/' . $pizzaId, [], [], ['CONTENT_TYPE' => 'application/json'], '{"name": "Pizza Updated"}');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        // Obtiene la pizza actualizada
        $client->request('GET', '/api/pizzas/' . $pizzaId);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals('Pizza Updated', json_decode($client->getResponse()->getContent(), true)['name']);

        // Elimina la pizza
        $client->request('DELETE', '/api/pizzas/' . $pizzaId);
        $this->assertEquals(204, $client->getResponse()->getStatusCode());

        // Intenta obtener la pizza eliminada
        $client->request('GET', '/api/pizzas/' . $pizzaId);
        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }
}
