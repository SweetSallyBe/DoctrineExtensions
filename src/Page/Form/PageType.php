<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Form;

use App\Entity\Page;
use App\Entity\PageTranslation;
use SweetSallyBe\Helpers\Service\Helper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PageType extends AbstractType
{
    private Helper $helper;

    public function __construct(Helper $helper)
    {
        $this->helper = $helper;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $page = ($options['data']) ?: null;
        $definedLanguages = $this->helper->getDefinedLanguages();
        foreach ($definedLanguages as $language => $definedLanguage) {
            $pageTranslation = ($page) ? $page->getTranslationForLocale($language) : null;
            if (!$pageTranslation) {
                $pageTranslation = new PageTranslation();
                $pageTranslation->setLocale($language);
            }
            $builder->add(
                'translation_' . $language,
                PageTranslationType::class,
                ['data' => $pageTranslation, 'mapped' => false]
            );
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Page::class,
            ]
        );
    }
}
