<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales;

use Spryker\Zed\CommentSalesConnector\Communication\Plugin\Sales\CommentThreadAttachedCommentOrderPostSavePlugin;
use Spryker\Zed\CommentSalesConnector\Communication\Plugin\Sales\CommentThreadOrderExpanderPlugin;
use Spryker\Zed\CompanyBusinessUnitSalesConnector\Communication\Plugin\Sales\CompanyBusinessUnitCustomerFilterOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanyBusinessUnitSalesConnector\Communication\Plugin\Sales\CompanyBusinessUnitCustomerOrderAccessCheckPlugin;
use Spryker\Zed\CompanyBusinessUnitSalesConnector\Communication\Plugin\Sales\CompanyBusinessUnitCustomerSortingOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanyBusinessUnitSalesConnector\Communication\Plugin\Sales\CompanyBusinessUnitFilterOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanyBusinessUnitSalesConnector\Communication\Plugin\Sales\SaveCompanyBusinessUnitUuidOrderPostSavePlugin;
use Spryker\Zed\CompanySalesConnector\Communication\Plugin\Sales\CompanyCustomerFilterOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanySalesConnector\Communication\Plugin\Sales\CompanyCustomerOrderAccessCheckPlugin;
use Spryker\Zed\CompanySalesConnector\Communication\Plugin\Sales\CompanyCustomerSortingOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanySalesConnector\Communication\Plugin\Sales\CompanyFilterOrderSearchQueryExpanderPlugin;
use Spryker\Zed\CompanySalesConnector\Communication\Plugin\Sales\SaveCompanyUuidOrderPostSavePlugin;
use Spryker\Zed\Customer\Communication\Plugin\Sales\CustomerOrderHydratePlugin;
use Spryker\Zed\Discount\Communication\Plugin\Sales\DiscountOrderHydratePlugin;
use Spryker\Zed\ManualOrderEntry\Communication\Plugin\Sales\OrderSourceExpanderPreSavePlugin;
use Spryker\Zed\MerchantSalesOrder\Communication\Plugin\Sales\MerchantOrderDataOrderExpanderPlugin;
use Spryker\Zed\MerchantSalesOrder\Communication\Plugin\Sales\MerchantReferenceOrderItemExpanderPreSavePlugin;
use Spryker\Zed\MerchantSalesOrder\Communication\Plugin\Sales\MerchantReferencesOrderExpanderPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Sales\OmsStatesOrderExpanderPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Sales\StateHistoryOrderItemExpanderPlugin;
use Spryker\Zed\OrderCustomReference\Communication\Plugin\Sales\OrderCustomReferenceOrderPostSavePlugin;
use Spryker\Zed\Payment\Communication\Plugin\Sales\PaymentOrderHydratePlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Sales\ProductBundleIdHydratorPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Sales\ProductBundleOptionOrderExpanderPlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Sales\ProductBundleOrderHydratePlugin;
use Spryker\Zed\ProductBundle\Communication\Plugin\Sales\UniqueOrderBundleItemsExpanderPlugin;
use Spryker\Zed\ProductMeasurementUnit\Communication\Plugin\Sales\QuantitySalesUnitHydrateOrderPlugin;
use Spryker\Zed\ProductMeasurementUnit\Communication\Plugin\SalesExtension\QuantitySalesUnitOrderItemExpanderPreSavePlugin;
use Spryker\Zed\ProductOfferSales\Communication\Plugin\Sales\ProductOfferReferenceOrderItemExpanderPreSavePlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\Sales\ProductOptionGroupIdHydratorPlugin;
use Spryker\Zed\ProductOption\Communication\Plugin\Sales\ProductOptionsOrderItemExpanderPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\Checkout\PackagingUnitSplittableItemTransformerStrategyPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\Sales\AmountLeadProductHydrateOrderPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\Sales\AmountSalesUnitHydrateOrderPlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\SalesExtension\AmountSalesUnitOrderItemExpanderPreSavePlugin;
use Spryker\Zed\ProductPackagingUnit\Communication\Plugin\SalesExtension\ProductPackagingUnitOrderItemExpanderPreSavePlugin;
use Spryker\Zed\Sales\SalesDependencyProvider as SprykerSalesDependencyProvider;
use Spryker\Zed\SalesConfigurableBundle\Communication\Plugin\Sales\ConfiguredBundleItemPreTransformerPlugin;
use Spryker\Zed\SalesConfigurableBundle\Communication\Plugin\Sales\ConfiguredBundleOrderExpanderPlugin;
use Spryker\Zed\SalesConfigurableBundle\Communication\Plugin\Sales\ConfiguredBundlesOrderPostSavePlugin;
use Spryker\Zed\SalesMerchantConnector\Communication\Plugin\OrderItemReferenceExpanderPreSavePlugin;
use Spryker\Zed\SalesProductConnector\Communication\Plugin\Sales\ItemMetadataSearchOrderExpanderPlugin;
use Spryker\Zed\SalesProductConnector\Communication\Plugin\Sales\MetadataOrderItemExpanderPlugin;
use Spryker\Zed\SalesProductConnector\Communication\Plugin\Sales\ProductIdHydratorPlugin;
use Spryker\Zed\SalesQuantity\Communication\Plugin\SalesExtension\IsQuantitySplittableOrderItemExpanderPreSavePlugin;
use Spryker\Zed\SalesQuantity\Communication\Plugin\SalesExtension\NonSplittableItemTransformerStrategyPlugin;
use Spryker\Zed\SalesReclamationGui\Communication\Plugin\Sales\ReclamationSalesTablePlugin;
use Spryker\Zed\SalesReturn\Communication\Plugin\Sales\RemunerationTotalOrderExpanderPlugin;
use Spryker\Zed\SalesReturn\Communication\Plugin\Sales\UpdateOrderItemIsReturnableByGlobalReturnableNumberOfDaysPlugin;
use Spryker\Zed\SalesReturn\Communication\Plugin\Sales\UpdateOrderItemIsReturnableByItemStatePlugin;
use Spryker\Zed\Shipment\Communication\Plugin\ShipmentOrderHydratePlugin;

class SalesDependencyProvider extends SprykerSalesDependencyProvider
{
    /**
     * @return \Spryker\Zed\Sales\Dependency\Plugin\OrderExpanderPreSavePluginInterface[]
     */
    protected function getOrderExpanderPreSavePlugins(): array
    {
        return [
            new OrderSourceExpanderPreSavePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\OrderExpanderPluginInterface[]
     */
    protected function getOrderHydrationPlugins(): array
    {
        return [
            new ProductIdHydratorPlugin(),
            new ProductBundleOrderHydratePlugin(),
            new DiscountOrderHydratePlugin(),
            new ShipmentOrderHydratePlugin(),
            new PaymentOrderHydratePlugin(),
            new CustomerOrderHydratePlugin(),
            new ProductBundleIdHydratorPlugin(),
            new ProductOptionGroupIdHydratorPlugin(),
            new QuantitySalesUnitHydrateOrderPlugin(),
            new AmountLeadProductHydrateOrderPlugin(),
            new AmountSalesUnitHydrateOrderPlugin(),
            new CommentThreadOrderExpanderPlugin(),
            new ConfiguredBundleOrderExpanderPlugin(),
            new ProductBundleOptionOrderExpanderPlugin(),
            new RemunerationTotalOrderExpanderPlugin(),
            new MerchantOrderDataOrderExpanderPlugin(),
            new MerchantReferencesOrderExpanderPlugin(),
            new OmsStatesOrderExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\OrderItemExpanderPreSavePluginInterface[]
     */
    protected function getOrderItemExpanderPreSavePlugins(): array
    {
        return [
            new QuantitySalesUnitOrderItemExpanderPreSavePlugin(),
            new ProductPackagingUnitOrderItemExpanderPreSavePlugin(),
            new AmountSalesUnitOrderItemExpanderPreSavePlugin(),
            new IsQuantitySplittableOrderItemExpanderPreSavePlugin(),
            new OrderItemReferenceExpanderPreSavePlugin(),
            new MerchantReferenceOrderItemExpanderPreSavePlugin(),
            new ProductOfferReferenceOrderItemExpanderPreSavePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\ItemTransformerStrategyPluginInterface[]
     */
    public function getItemTransformerStrategyPlugins(): array
    {
        return [
            new PackagingUnitSplittableItemTransformerStrategyPlugin(), #ProductPackagingUnit
            new NonSplittableItemTransformerStrategyPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\SalesTablePluginInterface[]
     */
    protected function getSalesTablePlugins(): array
    {
        return [
            new ReclamationSalesTablePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\OrderPostSavePluginInterface[]
     */
    protected function getOrderPostSavePlugins(): array
    {
        return [
            new CommentThreadAttachedCommentOrderPostSavePlugin(),
            new ConfiguredBundlesOrderPostSavePlugin(),
            new OrderCustomReferenceOrderPostSavePlugin(),
            new SaveCompanyBusinessUnitUuidOrderPostSavePlugin(),
            new SaveCompanyUuidOrderPostSavePlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\ItemPreTransformerPluginInterface[]
     */
    protected function getItemPreTransformerPlugins(): array
    {
        return [
            new ConfiguredBundleItemPreTransformerPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\UniqueOrderItemsExpanderPluginInterface[]
     */
    protected function getUniqueOrderItemsExpanderPlugins(): array
    {
        return [
            new UniqueOrderBundleItemsExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\OrderItemExpanderPluginInterface[]
     */
    protected function getOrderItemExpanderPlugins(): array
    {
        return [
            new StateHistoryOrderItemExpanderPlugin(),
            new ProductOptionsOrderItemExpanderPlugin(),
            new MetadataOrderItemExpanderPlugin(),
            new UpdateOrderItemIsReturnableByItemStatePlugin(),
            new UpdateOrderItemIsReturnableByGlobalReturnableNumberOfDaysPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\SearchOrderExpanderPluginInterface[]
     */
    protected function getSearchOrderExpanderPlugins(): array
    {
        return [
            new ItemMetadataSearchOrderExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\SearchOrderQueryExpanderPluginInterface[]
     */
    protected function getOrderSearchQueryExpanderPlugins(): array
    {
        return [
            new CompanyBusinessUnitFilterOrderSearchQueryExpanderPlugin(),
            new CompanyFilterOrderSearchQueryExpanderPlugin(),
            new CompanyBusinessUnitCustomerFilterOrderSearchQueryExpanderPlugin(),
            new CompanyBusinessUnitCustomerSortingOrderSearchQueryExpanderPlugin(),
            new CompanyCustomerFilterOrderSearchQueryExpanderPlugin(),
            new CompanyCustomerSortingOrderSearchQueryExpanderPlugin(),
        ];
    }

    /**
     * @return \Spryker\Zed\SalesExtension\Dependency\Plugin\CustomerOrderAccessCheckPluginInterface[]
     */
    protected function getCustomerOrderAccessCheckPlugins(): array
    {
        return [
            new CompanyBusinessUnitCustomerOrderAccessCheckPlugin(),
            new CompanyCustomerOrderAccessCheckPlugin(),
        ];
    }
}
