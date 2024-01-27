<?php

namespace App\Form;

use App\Entity\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrandFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand_name', TextType::class, [
                'required'=>true,
                'label'=>'Brand name'
            ])
            ->add('company', TextType::class, [
                'required'=>true,
                'label'=>'Company'
            ])
            ->add('file', FileType::class, [
                'label'=>'Product Image',
                'required'=>false,
                'mapped'=>false
            ])
            ->add('image', HiddenType::class, [
                'required'=>false
            ])
            ->add('save', SubmitType::class, [
                'label'=>'Confirm'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Brand::class,
        ]);
    }
}
