<?php

declare(strict_types=1);

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class FrankfurterJSONDeserializerService
{
    private const BASEURL = "https://api.frankfurter.app/";
    private const CURRENCIES = "?base=PLN&symbols=EUR,USD,GBP,CZK";

    public function __construct()
    {
    }

    public function JSONDeserializeLatest()
    {
    }

    public function JSONDeserializeDate(Datetime $datetime)
    {
    }


}