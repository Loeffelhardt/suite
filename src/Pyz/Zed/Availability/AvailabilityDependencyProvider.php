<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Availability;

use Spryker\Zed\Availability\AvailabilityDependencyProvider as SprykerAvailabilityDependencyProvider;
use Spryker\Zed\ProductOfferAvailability\Communication\Plugin\Availability\ProductOfferAvailabilityProviderStrategyPlugin;
use Spryker\Zed\ProductOfferAvailability\Communication\Plugin\Availability\ProductOfferAvailabilityStockProviderStrategyPlugin;

class AvailabilityDependencyProvider extends SprykerAvailabilityDependencyProvider
{
    /**
     * @return \Spryker\Zed\AvailabilityExtension\Dependency\Plugin\AvailabilityProviderStrategyPluginInterface[]
     */
    protected function getAvailabilityProviderStrategyPlugins(): array
    {
        return [
            new ProductOfferAvailabilityProviderStrategyPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\AvailabilityExtension\Dependency\Plugin\AvailabilityStockProviderStrategyPluginInterface[]
     */
    protected function getAvailabilityStockProviderStrategyPlugins(): array
    {
        return [
            new ProductOfferAvailabilityStockProviderStrategyPlugin(),
        ];
    }
}
