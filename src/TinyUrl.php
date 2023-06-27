<?php

declare(strict_types=1);

namespace Samhk222\TinyUrl;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class TinyUrl
{
    private Client $client;

    public function __construct(
        public readonly ?string $token = null,
    ) {
        $this->client = new Client();
    }

    public static function token(string $token): self
    {
        return new self($token);
    }

    public function shorten(string $url): string
    {
        return match ($this->token) {
            null => $this->generateUnautenticatedUrl($url),
            default => $this->generateAutenticatedUrl($url),
        };
    }

    private function generateAutenticatedUrl(string $url): string
    {
        $headers = [
            'accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];

        if ($this->token != null) {
            $headers += ['Authorization' => 'Bearer ' . $this->token];
        }

        try {
            $response = $this->client->post('https://api.tinyurl.com/create', [
                'headers' => $headers,
                'json' => [
                    'url' => $url,
                ]
            ]);

            return json_decode($response->getBody()->getContents())->data->tiny_url;
        } catch (ClientException $e) {
            throw new Exception(
                "Error shortening url " . $e->getResponse()->getBody()->getContents()
            );
        }
    }

    private function generateUnautenticatedUrl(string $url): string
    {
        return static::get("https://tinyurl.com/api-create.php?url={$url}");
    }

    protected static function get($url): string
    {
        $curl = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_FOLLOWLOCATION => false,
        ];

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);

        curl_close($curl);

        if (!is_string($response)) {
            throw new Exception("Error shortening url ");
        }

        return $response;
    }
}
