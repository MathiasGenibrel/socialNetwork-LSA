<?php

namespace App\Form;

use App\Entity\Comments;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $date = date('Y-m-d H:i:s');
        $builder
            // ->add('created_date',DateTimeType::class,[
            //     'attr' => ['hidden' => true, 'value'=> $date],
            //     'label' => false
            // ])
            ->add('message',TextAreaType::class,[
                'attr' => ['class' =>'form-control']
                ])
            // ->add('post', HiddenType::class)
            // ->add('post')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
