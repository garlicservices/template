<?php

namespace App\GraphQL\Mutation;

use App\GraphQL\Mutation\Apartment\ApartmentCreate;
use App\GraphQL\Mutation\Apartment\ApartmentUpdate;
use App\GraphQL\Mutation\Apartment\ApartmentDelete;
use App\GraphQL\Mutation\Address\AddressCreate;
use App\GraphQL\Mutation\Address\AddressUpdate;
use App\GraphQL\Mutation\Address\AddressDelete;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class MutationType extends AbstractObjectType
{
    /**
    * Main mutation type
    * Contains root fields of service
    *
    * @param ObjectTypeConfig $config
    */
    public function build($config)
    {
        $config->addFields(
            [
                new ApartmentCreate(),
                new ApartmentUpdate(),
                new ApartmentDelete(),
                new AddressCreate(),
                new AddressUpdate(),
                new AddressDelete(),
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
        return "Main mutation level. Represents all query fields of whole service.";
    }
}
