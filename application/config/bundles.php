<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['all' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['all' => true],
    Enqueue\Bundle\EnqueueBundle::class => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
    Garlic\Bus\GarlicBusBundle::class => ['all' => true],
    Garlic\Auth\GarlicAuthBundle::class => ['all' => true],
    Nelmio\CorsBundle\NelmioCorsBundle::class => ['all' => true],
    Nelmio\ApiDocBundle\NelmioApiDocBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Lexik\Bundle\JWTAuthenticationBundle\LexikJWTAuthenticationBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle::class => ['all' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['all' => true],
    Youshido\GraphQLBundle\GraphQLBundle::class => ['all' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['dev' => true],
    Garlic\GraphQL\GarlicGraphQLBundle::class => ['all' => true],
];
