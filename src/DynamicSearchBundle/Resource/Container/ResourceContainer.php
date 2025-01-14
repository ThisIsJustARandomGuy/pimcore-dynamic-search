<?php

namespace DynamicSearchBundle\Resource\Container;

class ResourceContainer implements ResourceContainerInterface
{
    protected mixed $resource;
    protected bool $isBaseResource;
    protected string $resourceScaffolderIdentifier;
    protected array $attributes;

    public function __construct(mixed $resource, bool $isBaseResource, string $resourceScaffolderIdentifier, array $attributes = [])
    {
        $this->resource = $resource;
        $this->isBaseResource = $isBaseResource;
        $this->resourceScaffolderIdentifier = $resourceScaffolderIdentifier;
        $this->attributes = $attributes;
    }

    public function hasResource(): bool
    {
        return $this->resource !== null;
    }

    public function isBaseResource(): bool
    {
        return $this->isBaseResource === true;
    }

    public function getResource(): mixed
    {
        return $this->resource;
    }

    public function getResourceScaffolderIdentifier(): string
    {
        return $this->resourceScaffolderIdentifier;
    }

    public function hasAttribute(string $attribute): bool
    {
        return isset($this->attributes[$attribute]);
    }

    public function getAttribute(string $attribute): mixed
    {
        return $this->attributes[$attribute];
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
