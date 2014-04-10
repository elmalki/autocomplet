<?php

namespace Yassine\AjaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Yassine\AjaxBundle\Entity\Personne;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YassineAjaxBundle:Default:index.html.twig');
    }
    public function ajaxAction(){
        $request = $this->container->get('request');
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $personnes = $qb->select('p')->from('Yassine\AjaxBundle\Entity\Personne', 'p')
          ->where( $qb->expr()->like('p.name', $qb->expr()->literal('%' . $request->request->get('token') . '%')) )
          ->getQuery()
          ->getResult();
          $html = '';
        foreach ($personnes as $personne) {
            $html .= $personne->getName().'<br />';
        }

      $response = new Response($html);
      return $response;
    }
}
