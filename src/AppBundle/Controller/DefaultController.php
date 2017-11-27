<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Thoughts;
use AppBundle\Form\SendThoughtsType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
     * @Route("admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/admin.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("fulgurance", name="fulgurance")
     */
    public function fulguranceAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/fulgurance.html.twig', array(
            'thoughts' => array_reverse($thoughts),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("humour", name="humour")
     */
    public function humourAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/humour.html.twig', array(
            'thoughts' => array_reverse($thoughts),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("philosophie", name="philosophie")
     */
    public function philosophieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/philosophie.html.twig', array(
            'thoughts' => array_reverse($thoughts),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("poesie", name="poesie")
     */
    public function poesieAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/poesie.html.twig', array(
            'thoughts' => array_reverse($thoughts),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * @Route("politique", name="politique")
     */
    public function politiqueAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/politique.html.twig', array(
            'thoughts' => array_reverse($thoughts),
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ));
    }
    /**
     * Creates a new thought entity.
     *
     * @Route("/new", name="thoughts_new")
     * @Method({"GET", "POST"})
     */
    public function sendAction(Request $request)
    {
        $thought = new Thoughts();
        $form = $this->createForm(SendThoughtsType::class, $thought);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thought);
            $em->flush();

            return $this->redirectToRoute('homepage', array('id' => $thought->getId()));
        }

        return $this->render('pages/new.html.twig', array(
            'thought' => $thought,
            'form' => $form->createView(),
        ));
    }



    /**
     * Lists all thought entities.
     *
     * @Route("/", name="homepage")
     * @Method("GET")
     */

    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('pages/index.html.twig', array(
            'thoughts' => array_reverse($thoughts),
        ));
    }

}
