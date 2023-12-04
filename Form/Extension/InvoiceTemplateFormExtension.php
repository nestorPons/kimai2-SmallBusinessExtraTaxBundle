<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\Form\Extension;

use App\Form\InvoiceTemplateForm;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use KimaiPlugin\SmallBusinessExtraTaxBundle\Configuration\SmallBusinessExtraTaxConfiguration;

class InvoiceTemplateFormExtension extends AbstractTypeExtension
{
    /**
     * @var SmallBusinessExtraTaxConfiguration
     */
    private SmallBusinessExtraTaxConfiguration $configuration;

    /**
     * @param SmallBusinessExtraTaxConfiguration $configuration
     */
    public function __construct(SmallBusinessExtraTaxConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        return [InvoiceTemplateForm::class];
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if ($this->configuration->isSmallBusinessRule()) {
            $builder->add('extra_tax', NumberType::class, [
                'label' => 'IRPF',
                'required' => false,
                'scale' => 2,
            ]);
        }
    }
}
