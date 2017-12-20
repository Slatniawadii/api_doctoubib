<?php

namespace AppBundle\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\Exception\ResourceClassNotSupportedException;


final class IndexCollectionDataProvider implements CollectionDataProviderInterface
{
    public function getCollection(string $resourceClass, string $operationName = null)
    {
        return [];
    }
}