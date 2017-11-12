<?php

namespace AppBundle\Form;

use AppBundle\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('pseudo',         TextType::class)
                ->add('title',    TextType::class)
                ->add('content',    TextType::class)
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
                ->add('email',    EmailType::class)
                ->add('envoyer',     SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Contact::class,
        ));
    }


    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
