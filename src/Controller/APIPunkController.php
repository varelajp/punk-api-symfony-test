<?php

namespace App\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class APIPunkController extends AbstractController
{
    /**
     * PHP HTTP client library
     *
     * @var GuzzleHttp\Client
     */
    private $guzzle_client;
    
    function __construct()
    {
        $this->guzzle_client = new Client([ 'verify' => false]);
    }
    /**
     * Root page info
     * 
     * @Route("/")
     * @return void
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * Get beer info by given pairing food.
     *
     * @param string $food
     * @Route("/search-by-food/{food}")
     * @return Response
     */
    public function searchByFood($food = "no food provided") : Response
    {
        if ($food === "no food provided") {
            return new Response($food);
        }

        try {
            $guzzle_response = $this->guzzle_client->request(
                "GET",
                "https://api.punkapi.com/v2/beers/?food=$food",
            );
            $json_guzzle_response = json_decode($guzzle_response->getBody());

            // Success Guzzle request. No beer founded with given pairing food.
            if (count($json_guzzle_response) == 0) {
                return new Response("Food not found");
            }

            // Returning founded beers with given pairing food.
            return $this->render('beers-by-food.html.twig', [
                'food'  => $food,
                'beers' => $json_guzzle_response,
            ]);
        } catch (RequestException $error) {
            // There was Guzzle request exception.
            if ($error->hasResponse()) {
                return new Response("Got Guzzle HHTP Client response ". $error->getResponse()->getStatusCode());
            }
        } catch (\Exception $error) {
            // There was another exception.
            return new Response("Got error: ". $error->getMessage());
        }
    }

    /**
     * Get beers info by given id.
     *
     * @param string $id
     * @Route("/search-by-id/{id}")
     * @return Response
     */
    public function searchById($id = "no id provided") : Response
    {
        if ($id === "no id provided") {
            return new Response($id);
        }

        try {
            $guzzle_response = $this->guzzle_client->request(
                "GET",
                "https://api.punkapi.com/v2/beers/$id",
            );
            $json_guzzle_response = json_decode($guzzle_response->getBody());

            if (count($json_guzzle_response) == 0) {
                // Success Guzzle request. No beer founded with given id.
                return new Response("Beer not found");
            }

            // Returning founded beer with given id.
            return $this->render('beer-by-id.html.twig', [
                'id'   => $id,
                'beer' => $json_guzzle_response,
            ]);
        } catch (RequestException $error) {
            // There was Guzzle request exception.
            if ($error->hasResponse()) {
                return new Response("Got Guzzle HHTP Client response ". $error->getResponse()->getStatusCode());
            }
        } catch (\Exception $error) {
            // There was another exception.
            return new Response("Got error: ". $error->getMessage());
        }
    }
}
