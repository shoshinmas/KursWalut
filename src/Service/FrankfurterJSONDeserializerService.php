<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\CurrencyRate;
use App\Model\FrankfurterObj;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class FrankfurterJSONDeserializerService
{
    private const BASEURL = "https://api.frankfurter.app/";
    private const CURRENCIES = "?base=PLN&symbols=EUR,USD,GBP,CZK";

    public function JSONDeserializeDate(string $datetime): FrankfurterObj
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $frankfurterObj = self::BASEURL . $datetime . self::CURRENCIES;
        return  $serializer->deserialize($frankfurterObj, FrankfurterObj::class, 'json');
    }


}