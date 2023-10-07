<?php

namespace CodeWithDennis\ChamberOfCommerce;

use Illuminate\Support\Facades\Http;

class ChamberOfCommerce
{
    private array $queryParameters = [];

    private string $baseUrl = 'https://api.kvk.nl/api/v1/';

    private array $headers;

    private array $options;

    public function __construct()
    {
        $this->headers = ['apikey' => config('chamber-of-commerce.key')];
        $this->options = ['verify' => false];
    }

    private function makeRequest(string $endpoint)
    {
        // Build the complete URL by combining the base URL and the provided endpoint
        $url = $this->baseUrl.$endpoint;

        // Add query parameters to the URL
        if ($endpoint == 'zoeken') {
            $filteredParameters = array_filter($this->queryParameters, fn ($value) => $value !== null);
            $url .= '?'.http_build_query($filteredParameters);
        } elseif (str_contains($endpoint, 'basisprofielen') && isset($this->queryParameters['geoData'])) {
            $url .= '?geoData='.$this->queryParameters['geoData'];
        }

        // Send an HTTP GET request to the constructed URL with headers and options
        $results = Http::withHeaders($this->headers)
            ->withOptions($this->options)
            ->get($url);

        // Decode the JSON response and return it
        return json_decode($results->body());
    }

    public function number(string $number = null): static
    {
        $this->queryParameters['kvkNummer'] = $number;

        return $this;
    }

    public function name(string $name = null): static
    {
        $this->queryParameters['handelsnaam'] = $name;

        return $this;
    }

    public function rsin(string $rsin = null): static
    {
        $this->queryParameters['rsin'] = $rsin;

        return $this;
    }

    public function withInactiveCompanies(bool $withInactiveCompanies = false): static
    {
        $this->queryParameters['InclusiefInactieveRegistraties'] = $withInactiveCompanies ? 'true' : 'false';

        return $this;
    }

    public function branchNumber(string $branchNumber = null): static
    {
        $this->queryParameters['vestigingsnummer'] = $branchNumber;

        return $this;
    }

    public function streetName(string $streetName = null): static
    {
        $this->queryParameters['straatnaam'] = $streetName;

        return $this;
    }

    public function houseNumber(string $houseNumber = null): static
    {
        $this->queryParameters['huisnummer'] = $houseNumber;

        return $this;
    }

    public function houseNumberAddition(string $houseNumberAddition = null): static
    {
        $this->queryParameters['huisnummerToevoeging'] = $houseNumberAddition;

        return $this;
    }

    public function location(string $location = null): static
    {
        $this->queryParameters['plaats'] = $location;

        return $this;
    }

    public function postalCode(string $postalCode = null): static
    {
        $this->queryParameters['postcode'] = $postalCode;

        return $this;
    }

    public function type(string $type = null): static
    {
        $this->queryParameters['type'] = $type;

        return $this;
    }

    public function page(int $page = null): static
    {
        $this->queryParameters['pagina'] = $page;

        return $this;
    }

    public function pagination(int $pagination = null): static
    {
        $this->queryParameters['aantal'] = $pagination;

        return $this;
    }

    public function withGeo(bool $withGeo = true): static
    {
        $this->queryParameters['geoData'] = $withGeo ? 'true' : 'false';

        return $this;
    }

    public function profiles()
    {
        return $this->makeRequest('basisprofielen/'.$this->queryParameters['kvkNummer']);
    }

    public function search()
    {
        return $this->makeRequest('zoeken');
    }
}
