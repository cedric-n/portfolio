<?php

namespace App\Form;

use App\Entity\Realisation;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class RealisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label' => 'Nom',
            ])
            ->add('category', TextType::class,[
                'label' => 'Catégorie',
            ])
            ->add('beginAt', DateType::class,[
                'label' => 'Date de commencement',
                'widget' => 'single_text',
                'placeholder' => 'Sélectionner la date du début de la réalisation',
                'input_format' => 'd/m/Y',
                'attr' => ['class' => 'js-datepicker']
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
            ])
            ->add('posterFile',VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true,
                'download_uri' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Realisation::class,
        ]);
    }
}
