<?php

namespace App\Form;

use App\Entity\CommentaireChapitres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddCommentaireToChapitreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('commentaire',TextareaType::class, [
                'label' => false,
                'attr' => array(
                    'placeholder' => 'Commentaire...'
                )
            ])
            ->add("Envoyer", SubmitType::class, [
                'attr' => array(
                    'class' => 'divbtn'
                )
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CommentaireChapitres::class,
        ]);
    }
}
