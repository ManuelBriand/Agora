<?php

namespace AppBundle\Form;

use AppBundle\Entity\Thoughts;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SendThoughtsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('author')
            ->add('title')
            ->add('content')
            ->add('categories',    ChoiceType::class, [
                'placeholder' => 'Catégorie',
                'choices' => [
                    'Fulgurance' => 'fulgurance',
                    'Humour' => 'humour',
                    'Philosophie' => 'philosophie',
                    'Poésie' => 'poesie',
                    'Politique' => 'politique',
                ],
            ])
            ->add('visible', HiddenType::class, [
                'data' => 0,
            ])
            ->add('email')
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Thoughts::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_thoughts';
    }


}