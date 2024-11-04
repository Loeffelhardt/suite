<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Presentation;

use PyzTest\Yves\Customer\CustomerPresentationTester;
use PyzTest\Yves\Customer\PageObject\CustomerLoginPage;
use PyzTest\Yves\Customer\PageObject\CustomerRegistrationPage;

/**
 * Auto-generated group annotations
 *
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Presentation
 * @group CustomerRegistrationCest
 * Add your own group annotations below this line
 */
class CustomerRegistrationCest
{
    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function _before(CustomerPresentationTester $i): void
    {
        $i->amYves();
    }

    /**
     * @skip This test was temporarily skipped due to flikerness. See {@link https://spryker.atlassian.net/browse/CC-25718} for details
     *
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenRegistrationPage(CustomerPresentationTester $i): void
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->see(CustomerRegistrationPage::TITLE_CREATE_ACCOUNT);
    }

    /**
     * @skip This test was temporarily skipped due to flikerness. See {@link https://spryker.atlassian.net/browse/CC-25718} for details
     *
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanRegisterWithValidData(CustomerPresentationTester $i): void
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->fillOutRegistrationForm();
        $i->click(CustomerRegistrationPage::BUTTON_REGISTER);
        $i->seeCurrentUrlEquals(CustomerLoginPage::LOGIN_URL);
        $i->seeInSource(CustomerRegistrationPage::CONFIRM_YOUR_ACCOUNT_MESSAGE);
    }
}
