<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\Configuration;

use App\Configuration\SystemConfiguration;

class SmallBusinessExtraTaxConfiguration
{
    /**
     * @var SystemConfiguration
     */
    private $configuration;

    /**
     * @param SystemConfiguration $configuration
     */
    public function __construct(SystemConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return bool
     */
    public function isSmallBusinessRule(): bool
    {
        return (bool)$this->configuration->find('small_business_extra_tax.enable');
    }
}
