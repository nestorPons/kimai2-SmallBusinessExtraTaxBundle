<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\EventSubscriber;

use App\Event\SystemConfigurationEvent;
use App\Form\Model\Configuration;
use App\Form\Type\YesNoType;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SystemConfigurationSubscriber implements EventSubscriberInterface
{
    /**
     * @return array[]
     */
    public static function getSubscribedEvents()
    {
        return [
            SystemConfigurationEvent::class => ['onSystemConfiguration', 100],
        ];
    }

    /**
     * @param SystemConfigurationEvent $event
     * @return void
     */
    public function onSystemConfiguration(SystemConfigurationEvent $event)
    {
        foreach ($event->getConfigurations() as $configuration) {
            if ($configuration->getSection() !== 'invoice') {
                continue;
            }

            $configuration->addConfiguration(
                (new Configuration('small_business_extra_tax.enable'))
                    ->setLabel('small_business_extra_tax.enable')
                    ->setRequired(false)
                    ->setType(YesNoType::class)
                    ->setTranslationDomain('system-configuration')
            );
        }
    }
}
