<?php

namespace Ceres\Contexts;

use Ceres\Contexts\Traits\UserDataTrait;
use IO\Helper\ContextInterface;
use IO\Services\CheckoutService;

class CheckoutContext extends GlobalContext implements ContextInterface
{
    use UserDataTrait;

    public $checkoutData = null;

    public function init($params)
    {
        parent::init($params);

        /** @var CheckoutService $checkoutService */
        $checkoutService = pluginApp( CheckoutService::class );

        $this->checkoutData = $checkoutService->getCheckout();

        $this->initUserData();
    }
}