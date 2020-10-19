<?php

namespace App\Form;

use App\Entity\Mangas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutMangaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            //     ->add('type')
            ->add('imageFile', FileType::class)
            //     ->add('status')
            //     ->add('commentaire')
            //      ->add('users')
            ->add("Envoyer", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mangas::class,
        ]);
    }
}
