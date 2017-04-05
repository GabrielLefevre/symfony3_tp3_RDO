<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PanelProduction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PanelProductionController extends Controller
{

    public function newAction(Request $request)
    {
        $pp = new PanelProduction();
        $form = $this->createForm('AppBundle\Form\PanelProductionType', $pp, array(
            'validation_groups' => array('create')));
        if($request->getMethod()=== "POST") {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($pp);
                $em->flush($pp);
            }
        }
        return $this->render('panelprod/new.html.twig', array(
            'pp' => $pp,
            'form' => $form->createView(),
        ));
    }
}
