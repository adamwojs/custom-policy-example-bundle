<?php

namespace AdamWojs\CustomPolicyExampleBundle\Security\CustomPolicy;

use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\ConfigBuilderInterface;
use eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Security\PolicyProvider\PolicyProviderInterface;

class CustomPolicyProvider implements PolicyProviderInterface
{
    public function addPolicies(ConfigBuilderInterface $configBuilder)
    {
        $configBuilder->addConfig([
           'custom_module' => [
               'custom_function' => [ 'Custom' ]
           ]
        ]);
    }
}
