<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle\EventSubscriber;

use App\Event\InvoicePreRenderEvent;
use App\Invoice\InvoiceModel;
use KimaiPlugin\SmallBusinessExtraTaxBundle\Configuration\SmallBusinessExtraTaxConfiguration;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class InvoicePreRenderEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var SmallBusinessExtraTaxConfiguration
     */
    private SmallBusinessExtraTaxConfiguration $SmallBusinessExtraTaxConfiguration;
    /**
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    public function __construct(SmallBusinessExtraTaxConfiguration $SmallBusinessExtraTaxConfiguration, TranslatorInterface $translator)
    {
        $this->SmallBusinessExtraTaxConfiguration = $SmallBusinessExtraTaxConfiguration;
        $this->translator = $translator;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            InvoicePreRenderEvent::class => ['onInvoicePreRenderEvent', 100],
        ];
    }

    public function onInvoicePreRenderEvent(InvoicePreRenderEvent $event): void
    {
        if (!$this->SmallBusinessExtraTaxConfiguration->isSmallBusinessRule()) {
            return;
        }

        $model = $event->getModel();
        $this->setModelPaymentTerms($model);
        $model->setHideZeroTax(true);
    }

    /**
     * Adds a note about the small business rule to the model payment terms.
     *
     * @param InvoiceModel $model
     * @return void
     */
    private function setModelPaymentTerms(InvoiceModel $model): void
    {
        $terms = $model->getTemplate()->getPaymentTerms();
        $language = $model->getTemplate()->getLanguage();
        $text = $this->translator->trans('invoice.small_business_extra_tax', [], 'messages', $language);

        if (strpos($terms, $text) !== false) {
            return;
        }

        $terms = $text . PHP_EOL . PHP_EOL . $terms;
        $model->getTemplate()->setPaymentTerms($terms);
    }
}
