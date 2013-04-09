<?php

namespace djepo\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class djepoUserBundle extends Bundle
{
    public function getParent()
    {        
        return 'FOSUserBundle';
    }
}
