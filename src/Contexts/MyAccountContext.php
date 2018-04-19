<?php

namespace Ceres\Contexts;

use Ceres\Contexts\Traits\UserDataTrait;
use IO\Helper\ContextInterface;

class MyAccountContext extends GlobalContext implements ContextInterface
{
    use UserDataTrait;

    public function init($params)
    {
        parent::init($params);

        $this->initUserData();
    }
}