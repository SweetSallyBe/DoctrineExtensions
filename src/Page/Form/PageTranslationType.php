<?php

namespace SweetSallyBe\DoctrineExtensions\Page\Form;

use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use SweetSallyBe\DoctrineExtensions\Page\Entity\Interfaces\PageTranslationInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\RouterInterface;

class PageTranslationType extends AbstractType
{
    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('locale', HiddenType::class, ['required' => true])
            ->add(
                'title',
                TextType::class,
                ['label'      => 'Title',
                 'label_attr' => ['class' => 'required'],
                 'attr'       => ['required' => 'required']
                ]
            )
            ->add(
                'slug',
                TextType::class,
                ['label'      => 'Slug',
                 'label_attr' => ['class' => 'required'],
                 'attr'       => ['class'     => 'convertDataList',
                                  'data-list' => json_encode($this->getRoutes()),
                                  'required'  => 'required']]
            )
            ->add(
                'htmlTitle',
                TextType::class,
                ['label' => 'HTML title', 'label_attr' => ['class' => 'required'], 'attr' => ['required' => 'required']]
            )
            ->add('description', TextareaType::class, ['label' => 'Description', 'required' => false])
            ->add('htmlDescription', TextareaType::class, ['label' => 'HTML Description', 'required' => false])
            ->add(
                'content',
                TextEditorType::class,
                ['label' => 'Content of the page', 'required' => false]
            );
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => PageTranslationInterface::class,
            ]
        );
    }

    private function getRoutes(): array
    {
        $routes = $this->router->getRouteCollection()->all();
        $result = [];
        foreach ($routes as $route => $data) {
            if ($route[0] !== '_') {
                $result[] = $route;
            }
        }
        sort($result);
        return $result;
    }
}
