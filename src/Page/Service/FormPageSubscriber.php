<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Service;

use App\Entity\PageTranslation;
use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class FormPageSubscriber implements EventSubscriberInterface
{

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [FormEvents::PRE_SUBMIT => 'onPreSubmit'];
    }

    public function onPreSubmit(FormEvent $event)
    {
        $form = $event->getForm();
        $formData = $event->getData();
        $page = $form->getData();
        if ($page instanceof PageInterface) {
            foreach ($formData as $entry) {
                $translation = $page->getTranslationForLocale($entry['locale']);
                $addTranslation = false;
                if (!$translation) {
                    $translation = new PageTranslation();
                    $translation->setCreatedAt(new \DateTime());
                    $addTranslation = true;
                }
                $translation->setLocale($entry['locale'])
                    ->setTitle($entry['title'])
                    ->setSlug($entry['slug'])
                    ->setHtmlTitle($entry['htmlTitle'])
                    ->setDescription($entry['description'])
                    ->setHtmlDescription($entry['htmlDescription'])
                    ->setContent($entry['content'])
                    ->setUpdatedAt(new \DateTime());
                if ($addTranslation) {
                    $page->addTranslation($translation);
                }
            }
        }
    }
}