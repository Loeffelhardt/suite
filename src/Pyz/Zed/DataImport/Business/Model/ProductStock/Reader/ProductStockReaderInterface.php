<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\DataImport\Business\Model\ProductStock\Reader;

interface ProductStockReaderInterface
{
    /**
     * @param array<int> $availabilityAbstractIds
     *
     * @return array<int>
     */
    public function getProductAbstractIdsByAvailabilityAbstractIds(array $availabilityAbstractIds): array;
}
