<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\Invoice\Calculator;

use App\Invoice\Calculator\AbstractCalculator;
use App\Invoice\CalculatorInterface;
use KimaiPlugin\SmallBusinessExtraTaxBundle\Configuration\SmallBusinessExtraTaxConfiguration;

class SmallBusinessCalculator extends AbstractCalculator implements CalculatorInterface
{
    /**
     * @var CalculatorInterface
     */
    private CalculatorInterface $coreCalculator;

    /**
     * @var SmallBusinessExtraTaxConfiguration
     */
    private SmallBusinessExtraTaxConfiguration $configuration;

    /**
     * @param CalculatorInterface $coreCalculator
     * @param SmallBusinessExtraTaxConfiguration $configuration
     */
    public function __construct(CalculatorInterface $coreCalculator, SmallBusinessExtraTaxConfiguration $configuration)
    {
        $this->coreCalculator = $coreCalculator;
        $this->configuration = $configuration;
    }

    /**
     * @return float
     */
    public function getVat(): float
    {
        if ($this->configuration->isSmallBusinessRule()) {
            return 0.00;
        }

        return $this->coreCalculator->getVat();
    }

    /**
     * @return float
     */
    public function getTax(): float
    {
        if ($this->configuration->isSmallBusinessRule()) {
            return 0.00;
        }

        return $this->coreCalculator->getTax();
    }

    /**
     * @return \App\Invoice\InvoiceItem[]
     */
    public function getEntries(): array
    {
        $this->coreCalculator->setModel($this->model);
        return $this->coreCalculator->getEntries();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->coreCalculator->getId();
    }
}
