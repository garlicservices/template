<?php

namespace App\GraphQL;

use App\GraphQL\Mutation\MutationType;
use App\GraphQL\Query\QueryType;
use Youshido\GraphQL\Schema\AbstractSchema;
use Youshido\GraphQL\Config\Schema\SchemaConfig;

class Schema extends AbstractSchema
{
    /**
    * Main service schema. Contains mutation and query fields
    *
    * @param SchemaConfig $config
    */
    public function build(SchemaConfig $config)
    {
        $config
        ->setMutation(new MutationType())
        ->setQuery(new QueryType());
    }
}
