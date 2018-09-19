<?php

namespace App\GraphQL\Mutation\Apartment;

use Garlic\GraphQL\Field\FieldHelperAbstract;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use App\GraphQL\Type\ApartmentType;
use App\Service\GraphQL\ApartmentService;

class ApartmentUpdate extends FieldHelperAbstract
{
    /**
    * Arguments that used for filtering returned result.
    * Used for validating incoming parameters
    *
    * @param FieldConfig $config
    * @throws \Youshido\GraphQL\Exception\ConfigurationException
    */
    public function build(FieldConfig $config)
    {
        $type = new ApartmentType();
        $config->addArguments(
            $type->getArguments()
        );
    }
    
    /**
     * Resolver method for apartments list.
     * Used for search and filtering data from database
     *
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return mixed|null
     * @throws \Doctrine\ORM\Mapping\MappingException
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        return $this->container
            ->get(ApartmentService::class)
            ->update($this->cutArgument('id', $arguments), $arguments)
        ;
    }

    /**
    * Return type of the field
    * Map found data to object type. Could be List, Object etc. By default is ListType
    *
    * @return AbstractObjectType|AbstractType
    * @throws \Youshido\GraphQL\Exception\ConfigurationException
    */
    public function getType()
    {
        $type = new ApartmentType();
        return new ListType(
            $type->init()
        );
    }

    /**
    * Name of field in Main Mutation type. If not set will be used class name in snake_letters style
    *
    * @return bool|null|string
    */
    public function getName()
    {
        return 'ApartmentUpdate';
    }

    /**
    * Return description which will represent on documentation page
    *
    * @return string
    */
    public function getDescription()
    {
        return "Model that update Apartment objects ";
    }
}
