<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Thoughts;
use AppBundle\Form\SendThoughtsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Thought controller.
 *
 * @Route("thoughts")
 */
class ThoughtsController extends Controller
{
    /**
     * Lists all thought entities.
     *
     * @Route("/", name="thoughts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $thoughts = $em->getRepository('AppBundle:Thoughts')->findAll();

        return $this->render('thoughts/index.html.twig', array(
            'thoughts' => array_reverse($thoughts),
        ));
    }

    /**
     * Finds and displays a thought entity.
     *
     * @Route("/{id}", name="thoughts_show")
     * @Method("GET")
     */
    public function showAction(Thoughts $thought)
    {
        $deleteForm = $this->createDeleteForm($thought);

        return $this->render('thoughts/show.html.twig', array(
            'thought' => $thought,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing thought entity.
     *
     * @Route("/{id}/edit", name="thoughts_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Thoughts $thought)
    {
        $deleteForm = $this->createDeleteForm($thought);
        $editForm = $this->createForm('AppBundle\Form\ThoughtsType', $thought);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thoughts_index', array('id' => $thought->getId()));
        }

        return $this->render('thoughts/edit.html.twig', array(
            'thought' => $thought,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a thought entity.
     *
     * @Route("/{id}", name="thoughts_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Thoughts $thought)
    {
        $form = $this->createDeleteForm($thought);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($thought);
            $em->flush();
        }

        return $this->redirectToRoute('thoughts_index');
    }

    /**
     * Creates a form to delete a thought entity.
     *
     * @param Thoughts $thought The thought entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Thoughts $thought)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('thoughts_delete', array('id' => $thought->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
