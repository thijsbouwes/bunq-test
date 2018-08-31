<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Psr7;
use Illuminate\Support\Facades\Log;

class BunqClient
{
    private $code;
    private $client;

    public function __construct($code)
    {
        $this->code = $code;

        $this->client = new Client([
            'base_uri' => config('services.bunq.base_uri')
        ]);
    }

    public function requestToken()
    {
        return $this->request('POST', 'token', [
            'query' => [
                'grant_type'    => 'authorization_code',
                'code'          => $this->code,
                'redirect_uri'  => config('services.bunq.client_redirect_uri'),
                'client_id'     => config('services.bunq.client_id'),
                'client_secret' => config('services.bunq.client_secret')
            ]
        ]);
    }

    private function request($method, $uri = '', array $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);

            return $this->buildResponse($response);
        } catch (TransferException $exception) {
            Log::error("Request " . Psr7\str($exception->getResponse()));

            throw $exception;
        }
    }

    private function buildResponse($response)
    {
        return collect(json_decode($response->getBody()->getContents(), true));
    }
}