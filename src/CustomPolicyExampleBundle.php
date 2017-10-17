<?php

namespace AdamWojs\CustomPolicyExampleBundle;

use AdamWojs\CustomPolicyExampleBundle\Security\CustomPolicy\CustomPolicyProvider;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CustomPolicyExampleBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // Retrieve "ezpublish" container extension.
        $eZExtension = $container->getExtension('ezpublish');
        // Add the policy provider.
        $eZExtension->addPolicyProvider(new CustomPolicyProvider());
    }
}
