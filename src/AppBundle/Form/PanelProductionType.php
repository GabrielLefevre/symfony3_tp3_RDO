<?php

/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 27/03/2017
 * Time: 12:07
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PanelProductionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serialnumber', null,array('label' => 'form.panel.panelproductiontype.serialnumber'))
            ->add('madeAt',null, array(
                    'label' => 'form.panel.panelproductiontype.madeAt',
                    'required' => false,
                    'attr' => array('placeholder' => date('Y-m-d'), 'label-inline' => 'label-inline', 'class' => 'myDatePiker'))
            )
            ->add('profile', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.profile', 'choices' => array(
                'PR96' => 'PR96',
                'PR116' => 'PR116'
            )))
            ->add('structure', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.structure', 'choices' => array(
                'Simple Face' => 'Simple Face',
                'Double Face' => 'Double Face',
                'Mural' => 'Mural'
            )))
            ->add('ral', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.ral', 'choices' => array(
                'AKZO 900 Gris'        => 'AKZO 900 Gris',
                'AKZO 2500 Vert'       => 'AKZO 2500 Vert',
                'AKZO 2525 Manganese'  => 'AKZO 2525 Manganese',
                'AKZO 2600 Sable'      => 'AKZO 2600 Sable',
                'AKZO 2400 Gris Sable' => 'AKZO 2400 Gris Sable',
                'AKZO 2650 Brun'       => 'AKZO 2650 Brun',
                'AKZO 2900 Gris'       => 'AKZO 2900 Gris',
                'RAL 900 Sable Noir'   => 'RAL 900 Sable Noir',
                'RAL 1015 Ivoire Clair'  => 'RAL 1015 Ivoire Clair',
                'RAL 3003 Rouge Rubis'  => 'RAL 3003 Rouge Rubis',
                'RAL 3004 Rouge Pourpre'  => 'RAL 3004 Rouge Pourpre',
                'RAL 3005 Rouge Vin'  => 'RAL 3005 Rouge Vin',
                'RAL 5002 Bleu Outremer'  => 'RAL 5002 Bleu Outremer',
                'RAL 5015 Bleu Ciel'  => 'RAL 5015 Bleu Ciel',
                'RAL 5018 Bleu Turquoise'  => 'RAL 5018 Bleu Turquoise',
                'RAL 5023 Bleu Distant'  => 'RAL 5023 Bleu Distant',
                'RAL 6002 Vert Feuillage'  => 'RAL 6002 Vert Feuillage',
                'RAL 6004 Vert Bleu'  => 'RAL 6004 Vert Bleu',
                'RAL 6005 Vert Mousse'  => 'RAL 6005 Vert Mousse',
                'RAL 6007 Vert Bouteille'  => 'RAL 6007 Vert Bouteille',
                'RAL 6009 Vert Sapin'  => 'RAL 6009 Vert Sapin',
                'RAL 6012 Vert Noir'  => 'RAL 6012 Vert Noir',
                'RAL 6015 Olive Noir'  => 'RAL 6015 Olive Noir',
                'RAL 6020 Oxyde Chromique'  => 'RAL 6020 Oxyde Chromique',
                'RAL 6026 Vert Opale'  => 'RAL 6026 Vert Opale',
                'RAL 7000 Gris Petit-Gris'  => 'RAL 7000 Gris Petit-Gris',
                'RAL 7001 Gris Argent'  => 'RAL 7001 Gris Argent',
                'RAL 7004 Gris de Sécurité'  => 'RAL 7004 Gris de Sécurité',
                'RAL 7005 Gris Souris'  => 'RAL 7005 Gris Souris',
                'RAL 7006 Gris Beige'  => 'RAL 7006 Gris Beige',
                'RAL 7009 Gris Vert'  => 'RAL 7009 Gris Vert',
                'RAL 7011 Gris Fer'  => 'RAL 7011 Gris Fer',
                'RAL 7012 Gris Basalte'  => 'RAL 7012 Gris Basalte',
                'RAL 7013 Gris Brun'  => 'RAL 7013 Gris Brun',
                'RAL 7015 Gris Ardoise'  => 'RAL 7015 Gris Ardoise',
                'RAL 7016 Gris Anthracite'  => 'RAL 7016 Gris Anthracite',
                'RAL 7021 Gris Noir'  => 'RAL 7021 Gris Noir',
                'RAL 7022 Gris Terre d\'ombre'  => 'RAL 7022 Gris Terre d\'ombre',
                'RAL 7024 Gris Graphite'  => 'RAL 7024 Gris Graphite',
                'RAL 7026 Gris Granit'  => 'RAL 7026 Gris Granit',
                'RAL 7033 Gris Ciment'  => 'RAL 7033 Gris Ciment',
                'RAL 7034 Gris Jaune'  => 'RAL 7034 Gris Jaune',
                'RAL 7036 Gris Platine'  => 'RAL 7036 Gris Platine',
                'RAL 7038 Gris Agate'  => 'RAL 7038 Gris Agate',
                'RAL 7039 Gris Quartz'  => 'RAL 7039 Gris Quartz',
                'RAL 7043 Gris Trafic B'  => 'RAL 7043 Gris Trafic B',
                'RAL 7046 Gris Télé Gris 2'  => 'RAL 7046 Gris Télé Gris 2',
                'RAL 8003 Brun Argile'  => 'RAL 8003 Brun Argile',
                'RAL 8011 Brun Noisette'  => 'RAL 8011 Brun Noisette',
                'RAL 8014 Brun Sépia'  => 'RAL 8014 Brun Sépia',
                'RAL 8015 Brun Marron'  => 'RAL 8015 Brun Marron',
                'RAL 8016 Brun Acajou'  => 'RAL 8016 Brun Acajou',
                'RAL 8017 Brun Chocolat'  => 'RAL 8017 Brun Chocolat',
                'RAL 8019 Brun Gris'  => 'RAL 8019 Brun Gris',
                'RAL 9003 Blanc de Sécutité'  => 'RAL 9003 Blanc de Sécutité',
                'RAL 9004 Noir de Sécurité'  => 'RAL 9004 Noir de Sécurité',
                'RAL 9005 Noir Foncé'  => 'RAL 9005 Noir Foncé',
                'RAL 9007 Aluminium Gris'  => 'RAL 9007 Aluminium Gris',
                'RAL 9017 Noir Trafic'  => 'RAL 9017 Noir Trafic',
                'HORS NUANCIER BG4515BF4 MG Gris Satine Metal Givre' => 'HORS NUANCIER BG4515BF4 MG Gris Satine Metal Givre'
            )))
            ->add('cableBy', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.profile', 'choices' => array(
                'CentaureSystems' => 'Centaure Systems',
                'Eiffage' => 'Eiffage'
            )))
            ->add('regul', null, array('label' => 'form.panel.panelproductiontype.regul'))
            ->add('backlighting', null, array('label' => 'form.panel.panelproductiontype.backlighting'))
            ->add('rebootModem', null, array('label' => 'form.panel.panelproductiontype.rebootModem'))
            ->add('triLed', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.triLed', 'choices' => array(
                'Cree Wb-A4' => 'Cree Wb-A4',
                'Cree Wb-A5' => 'Cree Wb-A5',
                'Cree Xb-Wp' => 'Cree Xb-Wp',
                'Cree Xb-Wq' => 'Cree Xb-Wq',
                'Cree Xb-Wr' => 'Cree Xb-Wr',
                'Cree Xb-Ws' => 'Cree Xb-Ws',
                'Cree Ya-Wp' => 'Cree Ya-Wp',
                'Cree Ya-Wq' => 'Cree Ya-Wq',
                'Cree Ya-Wr' => 'Cree Ya-Wr',
                'Cree Ya-Ws' => 'Cree Ya-Ws',
                'Cree Yb-Ws' => 'Cree Yb-Ws',
            )))
            ->add('powerSupply', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.powerSupply', 'choices' => array(
                'Meanwell HRP-450-3.3' => 'Meanwell HRP-450-3.3',
                'Meanwell HRP-450-5' => 'Meanwell HRP-450-5',
                'Meanwell USP 500' => 'Meanwell USP 500',
                'Meanwell USP500' => 'Meanwell USP500',
                'Emmerson Astec 3.3V' => 'Emmerson Astec 3.3V',
                'Meanwell HRP-450-3.3' => 'Meanwell HRP-450-3.3',
                'Emmerson Astec 5V' => 'Emmerson Astec 5V',
                'Meanwell HRP-450-5' => 'Meanwell HRP-450-5',
                'Emmerson Astec 4.6V G2' => 'Emmerson Astec 4.6V G2'
            )))
            ->add('orderSupply', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.orderSupply', 'choices' => array(
                'Meanwell RD50 12' => 'Meanwell RD50 12',
                'Meanwell RD150 12' => 'Meanwell RD150 12',
                'Meanwell S100F 12' => 'Meanwell S100F 12',
            )))
            ->add('flashCard', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.flashCard', 'choices' => array(
                '16Go MSata W7' => '16Go MSata W7',
                '2Go WES W7' => '2Go WES W7',
                '8Go WES W7' => '8Go WES W7',
            )))
            ->add('videoCard', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.videoCard', 'choices' => array(
                'CENT118E' => 'CENT118E',
                'CENT118C' => 'CENT118C',
                'CENT118B' => 'CENT118B',
            )))
            ->add('videoOut', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.videoOut', 'choices' => array(
                'CENT127A' => 'CENT127A',
                'EPM1534' => 'EPM1534'
            )))
            ->add('modem', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.modem', 'choices' => array(
                'Aucun' => 'Aucun',
                'Erco&Gener Genpro 18E' => 'Erco&Gener Genpro 18E',
                'SIM5360E' => 'SIM5360E',
                'T5320E (3G)' => 'T5320E (3G)',
                'T900' => 'T900',
                'WPEA 252NI (wifi)' => 'WPEA 252NI (wifi)'
            )))
            ->add('antenna', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.antenna', 'choices' => array(
                'GC500L ( patch )' => 'GC500L ( patch )',
                'GC664B ( chapeau )' => 'GC664B ( chapeau )'
            )))
            ->add('fixation', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.fixation', 'choices' => array(
                'Equerres externes' => 'Equerres externes',
                'Equerres internes' => 'Equerres internes',
                'Equerres inox' => 'Equerres inox',
                'Autres' => 'Autres'
            )))
            ->add('macif', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.macif', 'choices' => array(
                'Neuf' => 'Neuf',
                'Contre Plaque' => 'Contre Plaque',
                'Pré-Fabriqué' => 'Pré-Fabriqué',
                'Réutilisation' => 'Réutilisation',
                'Scellement Chimique' => 'Scellement Chimique',
                'Autres' => 'Autres'
            )))
            ->add('protection', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.protection', 'choices' => array(
                'Citel MSB10-400' => 'Citel MSB10-400',
            )))
            ->add('thermostat', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.thermostat', 'choices' => array(
                '30°' => '30°',
            )))
            ->add('filter', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.filter', 'choices' => array(
                '16A' => '16A',
                '30A' => '30A',
                '5A' => '5A'
            )))
            ->add('fan', ChoiceType::class, array('label' => 'form.panel.panelproductiontype.fan', 'choices' => array(
                'Diam. 120' => 'Diam. 120',
            )))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Centaure\Bundles\PanelBundle\Entity\PanelProduction',
            'attr' => array(
                'class' => 'customerpanel'
            )
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'centaure_bundles_panelbundle_panelproductiontype';
    }
}
