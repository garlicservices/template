<?php

namespace App\GraphQL\Type;

use App\Entity\Address;
use Garlic\GraphQL\Type\Interfaces\BuilderInterface;
use Garlic\GraphQL\Type\TypeAbstract;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;

class AddressType extends TypeAbstract
{
    /**
     * Build list of Address fields
     * Could be used for config incoming arguments for queries or mutations
     *
     * @param BuilderInterface $builder
     */
    public function build(BuilderInterface $builder)
    {
        $builder
            ->addField('id', new IdType(), ['description' => 'Address ID'])
            ->addField('street', new StringType(), ['description' => 'Contains information about address street'])
            ->addField('country', new StringType(), ['description' => 'Contains information about address country'])
            ->addField('city', new StringType(), ['description' => 'Contains information about address city'])
            ->addField('zipcode', new StringType(), ['description' => 'Contains information about address zipcode'])
            ->addField('house', new StringType(), ['description' => 'Contains information about address house'])
            ->addField('createdAt', new DateTimeType(), ['description' => 'Time when apartment was created'])
            ->addField('updatedAt', new DateTimeType(), ['description' => 'Time when apartment was updated'])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return Address::class;
    }
}
