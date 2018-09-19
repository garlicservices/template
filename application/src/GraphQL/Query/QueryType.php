<?php

namespace App\GraphQL\Query;

use App\GraphQL\Query\Apartment\ApartmentFind;
use App\GraphQL\Query\Address\AddressFind;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class QueryType extends AbstractObjectType
{
    /**
    * Main query type
    * Contains root fields of service
    *
    * @param ObjectTypeConfig $config
    */
    public function build($config)
    {
        $config->addFields(
            [
                new ApartmentFind(),
                new AddressFind(),
            ]
        );
    }

    /**
    * Return description which will be represented on documentation page
    *
    * @return string
    */
    public function getDescription()
    {
        return "Main query level. Represents all query fields of whole service.";
    }
}
