<?php

namespace App\GraphQL\Type;

use App\Entity\Apartment;
use Garlic\GraphQL\Type\Interfaces\BuilderInterface;
use Garlic\GraphQL\Type\TypeAbstract;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQL\Type\Scalar\IntType;

class ApartmentType extends TypeAbstract
{
    /**
     * Build Apartment field list
     * Will be able to use for config incoming arguments for queries or mutations
     *
     * @param BuilderInterface $builder
     */
    public function build(BuilderInterface $builder)
    {
        $builder
            ->addField(
                'id',
                new IdType(),
                [
                    'description' => 'Apartment ID',
                    'required' => true,
                    'groups' => 'update'
                ]
            )
            ->addField(
                'size',
                new IntType(),
                [
                    'description' => 'Information about number of rooms',
                    'required' => true,
                    'groups' => 'create'
                ]
            )
            ->addField(
                'buildYear',
                new IntType(),
                [
                    'description' => 'Year when apartment was build',
                    'required' => true,
                    'groups' => 'create'
                ]
            )
            ->addField(
                'address',
                new AddressType(),
                [
                    'description' => 'Address object. Contains field with full address data',
                    'required' => true,
                    'groups' => 'create'
                ]
            )
            ->addField(
                'placement',
                new StringType(),
                [
                    'description' => 'Contains information about apartment address',
                    'deprecationReason' => 'Current field is now deprecated. Use field Address instead',
                    'isDeprecated' => true,
                ]
            )
            ->addField('createdAt', new DateTimeType(), ['description' => 'Time when apartment was created'])
            ->addField('updatedAt', new DateTimeType(), ['description' => 'Time when apartment was updated'])
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return Apartment::class;
    }
}
