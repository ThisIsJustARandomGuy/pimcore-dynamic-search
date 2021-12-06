<?php

namespace DynamicSearchBundle\Provider;

use DynamicSearchBundle\Context\ContextDefinitionInterface;
use DynamicSearchBundle\Exception\ProcessCancelledException;
use DynamicSearchBundle\Exception\ProviderException;
use DynamicSearchBundle\Normalizer\Resource\ResourceMetaInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface DataProviderInterface extends ProviderInterface
{
    public const PROVIDER_BEHAVIOUR_FULL_DISPATCH = 'full_dispatch';
    public const PROVIDER_BEHAVIOUR_SINGLE_DISPATCH = 'single_dispatch';

    public static function configureOptions(OptionsResolver $resolver): void;

    /**
     * @deprecated since 1.0.0 and will be removed in 2.0.0. Use {@link DataProviderValidationAwareInterface::validateResource} instead
     */
    public function checkUntrustedResourceProxy(ContextDefinitionInterface $contextDefinition, $resource);

    /**
     * @deprecated since 1.0.0 and will be removed in 2.0.0. Use {@link DataProviderValidationAwareInterface::validateResource} instead
     */
    public function validateUntrustedResource(ContextDefinitionInterface $contextDefinition, $resource);

    /**
     * @throws ProviderException
     * @throws ProcessCancelledException
     */
    public function provideAll(ContextDefinitionInterface $contextDefinition): void;

    /**
     * @throws ProviderException
     * @throws ProcessCancelledException
     */
    public function provideSingle(ContextDefinitionInterface $contextDefinition, ResourceMetaInterface $resourceMeta): void;
}
