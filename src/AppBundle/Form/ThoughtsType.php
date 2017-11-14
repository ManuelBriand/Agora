<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ThoughtsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('author')
            ->add('title')
            ->add('content', TextareaType::class, array(
                'attr' => array('class' => 'materialize-textarea'),
            ))
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
            ->add('email')
            ->add('visible', ChoiceType::class, [
                'placeholder' => 'Visible',
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,

                ],
            ]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Thoughts'
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
