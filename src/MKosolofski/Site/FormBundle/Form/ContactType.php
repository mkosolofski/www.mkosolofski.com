<?php

namespace MKosolofski\Site\FormBundle\Form;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\Form\Extension\Core\Type as FieldType,
    Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('company', FieldType\TextType::class, ['attr' => ['maxLength' => 50]])
            ->add('firstName', FieldType\TextType::class, ['attr' => ['maxLength' => 50]])
            ->add('lastName', FieldType\TextType::class, ['attr' => ['maxLength' => 50]])
            ->add('email', FieldType\EmailType::class, ['attr' => ['maxLength' => 50]])
            ->add('subject', FieldType\TextType::class, ['attr' => ['maxLength' => 100]])
            ->add('message', FieldType\TextareaType::class, ['attr' => ['maxLength' => 1000, 'rows' => 4]])
            ->add('submit', FieldType\SubmitType::class, ['attr' => ['maxLength' => 50]]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ['data_class' => 'MKosolofski\Site\DoctrineBundle\Entity\Contact']
        );
    }
}
