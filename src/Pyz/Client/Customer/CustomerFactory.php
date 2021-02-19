<?php


namespace Pyz\Client\Customer;
use Pyz\Client\Customer\Zed\CustomerStub;
use Spryker\Client\Customer\CustomerDependencyProvider;
use Spryker\Client\Customer\CustomerFactory as SprykerCustomerFactory;

class CustomerFactory extends SprykerCustomerFactory
{
    public function createZedCustomerStub()
    {
        return new CustomerStub($this->getProvidedDependency(CustomerDependencyProvider::SERVICE_ZED));
    }
}
