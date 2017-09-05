<?php

namespace PlantBundle\Controller;

use PlantBundle\Entity\Plant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PlantController extends Controller
{
    /**
     * @Route("/my-plants", name="myPlants")
     */
    public function indexAction()
    {
        $user=$this->getUser();
        $em = $this->getDoctrine()->getManager();

        $plants= $em->getRepository('PlantBundle:Plant')->findBy(['owner' => $user->getId()]);

        return $this->render('plant/index.html.twig', ['plants' => $plants]);
    }
    /**
     * @Route("/my-plants/{id}", name="showPlant")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $plant= $em->getRepository('PlantBundle:Plant')->find($id);

        return $this->render('plant/show.html.twig', ['plant' => $plant]);
    }
}
