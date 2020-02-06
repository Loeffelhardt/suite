<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Glue\Orders\RestApi;

use Codeception\Util\HttpCode;
use Generated\Shared\Transfer\CustomerTransfer;
use PyzTest\Glue\Orders\OrdersApiTester;
use Spryker\Glue\OrdersRestApi\OrdersRestApiConfig;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Glue
 * @group Orders
 * @group RestApi
 * @group OrdersRestApiCest
 * Add your own group annotations below this line
 * @group EndToEnd
 */
class OrdersRestApiCest
{
    /**
     * @var \PyzTest\Glue\Orders\RestApi\OrdersRestApiFixtures
     */
    protected $fixtures;

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function loadFixtures(OrdersApiTester $I): void
    {
        $this->fixtures = $I->loadFixtures(OrdersRestApiFixtures::class);
    }

    /**
     * @depends loadFixtures
     *
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetEmptyListOfOrders(OrdersApiTester $I): void
    {
        //Arrange
        $this->authorizeCustomer($I, $this->fixtures->getCustomerTransfer1());

        //Act
        $I->sendGET(
            $I->formatUrl(OrdersRestApiConfig::RESOURCE_ORDERS)
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();

        $I->amSure('The returned resource has correct self-link')
            ->whenI()
            ->seeResponseDataContainsEmptyCollection();

        $I->seeResponseLinksContainsSelfLink(
            $I->formatFullUrl(OrdersRestApiConfig::RESOURCE_ORDERS)
        );
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetListOfOrdersWithSingleOrder(OrdersApiTester $I): void
    {
        //Arrange
        $this->authorizeCustomer($I, $this->fixtures->getCustomerTransfer2());

        //Act
        $I->sendGET(
            $I->formatUrl(OrdersRestApiConfig::RESOURCE_ORDERS)
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();

        $I->amSure('The returned resource has correct self-link')
            ->whenI()
            ->seeResponseLinksContainsSelfLink(
                $I->formatFullUrl(OrdersRestApiConfig::RESOURCE_ORDERS)
            );

        $I->amSure('The returned resource has not empty collection')
            ->whenI()
            ->seeResponseDataContainsNonEmptyCollection();

        $I->amSure('The returned resource has correct resource collection type')
            ->whenI()
            ->seeResponseDataContainsResourceCollectionOfType('orders');

        $I->amSure('The returned resource has correct size')
            ->whenI()
            ->seeResponseDataContainsResourceCollectionOfTypeWithSizeOf('orders', 1);
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetOrderDetails(OrdersApiTester $I): void
    {
        //Arrange
        $this->authorizeCustomer($I, $this->fixtures->getCustomerTransfer2());
        $orderReference = $this->fixtures->getOrderTransfer()->getOrderReference();

        //Act
        $I->sendGET(
            $I->formatUrl(
                '{orders}/{customerOrderReference}',
                [
                    'orders' => OrdersRestApiConfig::RESOURCE_ORDERS,
                    'customerOrderReference' => $orderReference,
                ]
            )
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();

        $I->amSure('The returned resource has not empty collection')
            ->whenI()
            ->seeResponseDataContainsNonEmptyCollection();

        $I->amSure('The returned resource is of correct type')
            ->whenI()
            ->seeResponseDataContainsSingleResourceOfType('orders');

        $I->amSure('The returned resource has correct id')
            ->whenI()
            ->seeSingleResourceIdEqualTo($orderReference);
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetListOfOrderWithoutAuthorizationToken(OrdersApiTester $I): void
    {
        //Act
        $I->sendGET(
            $I->formatUrl(OrdersRestApiConfig::RESOURCE_ORDERS)
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::FORBIDDEN);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetOrderDetailsWithoutAuthorizationToken(OrdersApiTester $I): void
    {
        //Arrange
        $orderReference = $this->fixtures->getOrderTransfer()->getOrderReference();

        //Act
        $I->sendGET(
            $I->formatUrl(
                '{orders}/{customerOrderReference}',
                [
                    'orders' => OrdersRestApiConfig::RESOURCE_ORDERS,
                    'customerOrderReference' => $orderReference,
                ]
            )
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::FORBIDDEN);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     *
     * @return void
     */
    public function requestGetOrderDetailsWithIncorrectOrderReference(OrdersApiTester $I): void
    {
        //Arrange
        $this->authorizeCustomer($I, $this->fixtures->getCustomerTransfer2());

        //Act
        $I->sendGET(
            $I->formatUrl(
                '{orders}/{customerOrderReference}',
                [
                    'orders' => OrdersRestApiConfig::RESOURCE_ORDERS,
                    'customerOrderReference' => 'test',
                ]
            )
        );

        //Assert
        $I->seeResponseCodeIs(HttpCode::NOT_FOUND);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesOpenApiSchema();
    }

    /**
     * @param \PyzTest\Glue\Orders\OrdersApiTester $I
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function authorizeCustomer(OrdersApiTester $I, CustomerTransfer $customerTransfer): void
    {
        $token = $I->haveAuthorizationToGlue($customerTransfer)->getAccessToken();

        $I->amBearerAuthenticated($token);
    }
}
