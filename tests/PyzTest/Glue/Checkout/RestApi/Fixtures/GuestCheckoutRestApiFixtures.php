<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Glue\Checkout\RestApi\Fixtures;

use Generated\Shared\Transfer\CustomerTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use PyzTest\Glue\Checkout\CheckoutApiTester;
use SprykerTest\Shared\Testify\Fixtures\FixturesBuilderInterface;
use SprykerTest\Shared\Testify\Fixtures\FixturesContainerInterface;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Glue
 * @group Checkout
 * @group RestApi
 * @group GuestCheckoutRestApiFixtures
 * Add your own group annotations below this line
 * @group EndToEnd
 */
class GuestCheckoutRestApiFixtures implements FixturesBuilderInterface, FixturesContainerInterface
{
    protected const ANONYMOUS_PREFIX = 'anonymous:';

    /**
     * @var string
     */
    protected $guestCustomerReference;

    /**
     * @var \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected $productConcreteTransfer;

    /**
     * @var \Generated\Shared\Transfer\CustomerTransfer
     */
    protected $guestCustomerTransfer;

    /**
     * @var \Generated\Shared\Transfer\QuoteTransfer
     */
    protected $emptyGuestQuoteTransfer;

    /**
     * @return string
     */
    public function getGuestCustomerReference(): string
    {
        return $this->guestCustomerReference;
    }

    /**
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function getProductConcreteTransfer(): ProductConcreteTransfer
    {
        return $this->productConcreteTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function getGuestCustomerTransfer(): CustomerTransfer
    {
        return $this->guestCustomerTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getEmptyGuestQuoteTransfer(): QuoteTransfer
    {
        return $this->emptyGuestQuoteTransfer;
    }

    /**
     * @param \PyzTest\Glue\Checkout\CheckoutApiTester $I
     *
     * @return \SprykerTest\Shared\Testify\Fixtures\FixturesContainerInterface
     */
    public function buildFixtures(CheckoutApiTester $I): FixturesContainerInterface
    {
        $this->guestCustomerReference = $I->createGuestCustomerReference();
        $this->productConcreteTransfer = $I->haveProductWithStock();
        $this->guestCustomerTransfer = $I->createCustomerTransfer([
            CustomerTransfer::CUSTOMER_REFERENCE => static::ANONYMOUS_PREFIX . $this->guestCustomerReference,
        ]);
        $this->emptyGuestQuoteTransfer = $I->haveEmptyPersistentQuote([
            CustomerTransfer::CUSTOMER_REFERENCE => $this->guestCustomerReference,
        ]);

        return $this;
    }
}
