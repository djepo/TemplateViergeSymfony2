<?php

namespace co\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class coUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
