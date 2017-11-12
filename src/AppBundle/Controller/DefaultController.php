<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("fulgurance", name="fulgurance")
     */
    public function fulguranceAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/fulgurance.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("humour", name="humour")
     */
    public function humourAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/humour.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("philosophie", name="philosophie")
     */
    public function philosophieAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/philosophie.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("poesie", name="poesie")
     */
    public function poesieAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/poesie.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("politique", name="politique")
     */
    public function politiqueAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/politique.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('homepage');
        }

        return $this->render("pages/index.html.twig", [
            'form' => $form->createView(),
        ]);
    }

}
