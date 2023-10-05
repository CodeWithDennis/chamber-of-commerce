<?php

namespace CodeWithDennis\ChamberOfCommerce;

use Illuminate\Support\Facades\Http;

class ChamberOfCommerce
{
    private static string $baseUrl = 'https://api.kvk.nl/api/v1/';

    public static function search(
        string $number = null,
        string $name = null,
        string $rsin = null,
        string $streetName = null,
        string $houseNumber = null,
        string $houseNumberAddition = null,
        string $location = null,
        string $postalCode = null,
        string $branchNumber = null,
        string $type = null,
        bool $withInactiveCompanies = false,
        int $page = null,
        int $pagination = null
    ) {
        $queryParameters = [
            'handelsnaam' => $name,
            'kvkNummer' => $number,
            'rsin' => $rsin,
            'InclusiefInactieveRegistraties' => $withInactiveCompanies ? 'true' : 'false',
            'vestigingsnummer' => $branchNumber,
            'straatnaam' => $streetName,
            'huisnummer' => $houseNumber,
            'huisnummerToevoeging' => $houseNumberAddition,
            'postcode' => $postalCode,
            'plaats' => $location,
            'type' => $type,
            'pagina' => $page,
            'aantal' => $pagination,
        ];

        $results = Http::withHeaders(['apikey' => config('chamber-of-commerce.key')])
            ->withOptions(['verify' => false])
            ->get(self::$baseUrl.'zoeken'.'?'.http_build_query(array_filter($queryParameters, fn ($value) => $value !== null)));

        return json_decode($results->body());
    }

    public static function basicProfiles(
        string $number = null,
        ?bool $withGeo = false
    ) {
        $queryParameters = [
            'geoData' => $withGeo ? 'true' : 'false',
        ];

        $results = Http::withHeaders(['apikey' => config('chamber-of-commerce.key')])
            ->withOptions(['verify' => false])
            ->get(self::$baseUrl.'basisprofielen'.'/'.$number.'/?'.http_build_query(array_filter($queryParameters, fn ($value) => $value !== null)));

        return json_decode($results->body());
    }
}