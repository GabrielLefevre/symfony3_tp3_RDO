<?php

/**
 * Created by PhpStorm.
 * User: DEV2
 * Date: 05/04/2017
 * Time: 12:09
 */

namespace AppBundle\Chart;

use Doctrine\Common\Persistence\ObjectManager;

class ChartData
{
    private $em;


    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    public function dataTestGraph() {
        $data = [['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ];

        return $data;
    }

    public function dataCableBy() {
        $panneauC = $this->em->getRepository('AppBundle:PanelProduction')->cableByCentaure();
        $panneauE = $this->em->getRepository('AppBundle:PanelProduction')->cableByEiffage();
        $data= [['Panneau','Cableur'],
            ['Centaure',count($panneauC)],
            ['Eiffage',count($panneauE)]
        ];
        return $data;
    }

    public function dataStructure() {
        $afficheurSimpleFace = $this->em->getRepository('AppBundle:PanelProduction')->structureSimpleFace();
        $afficheurDoubleFace = $this->em->getRepository('AppBundle:PanelProduction')->structureDoubleFace();
        $afficheurMural = $this->em->getRepository('AppBundle:PanelProduction')->structureMural();
        $data = [
            ['Structure','Nombre de panneau'],
            ['Simple Face',count($afficheurSimpleFace)],
            ['Double Face',count($afficheurDoubleFace)],
            ['Mural',count($afficheurMural)]
        ];

            return $data;
    }




}