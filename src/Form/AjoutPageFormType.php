<?php

namespace App\Form;

use App\Entity\Chapitres;
use App\Entity\Pages;
use App\Repository\ChapitresRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AjoutPageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $form = $builder->getData();
        $builder
              ->add('chapitre', EntityType::class, [
            'class' => Chapitres::class,
            'choice_label' => 'nom',
            'query_builder' => function (EntityRepository $er ) use ($options) {
                return $er->createQueryBuilder('c')
                    ->orderBy('c.nom', 'ASC')
                    ->where('c.arc = ?1')
                    ->setParameter(1, $options['arcid']);
            },
            'label' => false,
            
        ])
              ->add('imageFile', FileType::class,[
                  'label' => ' ',
                  'label_attr' => array('class' => 'label'),
                  ])
                      
              ->add("Upload", SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'arcid' => null,
            'data_class' => Pages::class,
        ]);
    }
}
