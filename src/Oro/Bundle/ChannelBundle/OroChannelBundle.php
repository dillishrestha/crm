<?php

namespace Oro\Bundle\ChannelBundle;

use Oro\Bundle\ChannelBundle\Async\Topics;
use Oro\Bundle\ChannelBundle\DependencyInjection\CompilerPass\SettingsPass;
use Oro\Bundle\MessageQueueBundle\DependencyInjection\Compiler\AddTopicMetaPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OroChannelBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new SettingsPass());

        $addTopicMetaPass = AddTopicMetaPass::create();
        $addTopicMetaPass
            ->add(Topics::CHANNEL_STATUS_CHANGED)
            ->add(Topics::AGGREGATE_LIFETIME_AVERAGE)
        ;

        $container->addCompilerPass($addTopicMetaPass);
    }
}
