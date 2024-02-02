<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Bateau;
use App\Entity\ListeEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListeEventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'label' => 'Nom de l\'événement',
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
                'row_attr' => ['class' => 'half-width'],
            ])
        
            ->add('nom', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
                'row_attr' => ['class' => 'half-width'],
            ])
            
            ->add('prenom', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
            ])
            ->add('telephone', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
            ])
            ->add('nomEntreprise', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
            ])
            ->add('dateHeureDebut', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
            ])
            ->add('dateHeureFin', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
            ])
            ->add('capacite', null, [
                'attr' => ['class' => 'form'],
                'label_attr' => ['class' => 'label-above'],
                
            ])
            ->add('bateau', EntityType::class, [
                'class' => Bateau::class,
                'choice_label' => 'nom',
                'placeholder' => 'Choisir votre bateau',
                'attr' => [
                    'class' => 'form-select', // Ajoutez une classe CSS pour le champ de sélection
                    // Ajoutez d'autres attributs HTML au besoin
                ],
                'label_attr' => ['class' => 'label-above'],
            ])

            ->add('etat', ChoiceType::class, [
                'label' => 'État',
                'choices' => [
                    'Validé' => 'Validé',
                    'Acompte payé' => 'Acompte payé',
                ],
                'attr' => [
                    'class' => 'form-select', // Ajoutez une classe CSS pour le champ de sélection
                    // Ajoutez d'autres attributs HTML au besoin
                ],
                'label_attr' => ['class' => 'label-above'],
            ]);

            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ListeEvent::class,
        ]);
    }
}
