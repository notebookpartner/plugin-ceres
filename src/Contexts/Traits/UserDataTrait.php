<?php

namespace Ceres\Contexts\Traits;

use IO\Services\CheckoutService;
use IO\Services\ContactBankService;
use IO\Services\CustomerService;

trait UserDataTrait
{
    public $contact = null;

    public $billingAddressList = [];
    public $selectedBillingAddressId = null;

    public $deliveryAddressList = [];
    public $selectedDeliveryAddressId = null;

    public $userBankData = [];

    public $contactHasReturns = null;

    protected function initUserData()
    {
        /** @var CustomerService $customerService */
        $customerService = pluginApp( CustomerService::class );

        /** @var CheckoutService $checkoutService*/
        $checkoutService = pluginApp( CheckoutService::class );

        /** @var ContactBankService $contactBankService */
        $contactBankService = pluginApp( ContactBankService::class );

        $this->contact = $customerService->getContact();

        $this->billingAddressList = $customerService->getAddresses(1);
        $this->selectedBillingAddressId = $checkoutService->getBillingAddressId();

        $this->deliveryAddressList = $customerService->getAddresses(2);
        $this->selectedDeliveryAddressId = $checkoutService->getDeliveryAddressId();

        if(isset($this->contact))
        {
            $this->userBankData = $contactBankService->getBanksOfContact($this->contact->id);

            $this->contactHasReturns = $customerService->hasReturns();
        }
    }
}