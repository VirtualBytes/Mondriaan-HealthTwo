<?php

namespace App\Controller;

use App\Entity\Medicijn;
use App\Form\MedicijnType;
use App\Entity\Recept;
use App\Form\ReceptType;
use App\Repository\ReceptRepository;
use App\Repository\MedicijnRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/medewerker/")
 */
class MedewerkerController extends AbstractController{
    /**
     * @Route("medicijn", name="medicijn_index", methods={"GET"})
     */
    public function index(MedicijnRepository $medicijnRepository): Response
    {
        return $this->render('medicijn/index.html.twig', [
            'medicijns' => $medicijnRepository->findAll(),
        ]);
    }

    /**
     * @Route("medicijn/new", name="medicijn_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $medicijn = new Medicijn();
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($medicijn);
            $entityManager->flush();

            return $this->redirectToRoute('medicijn_index');
        }

        return $this->render('medicijn/new.html.twig', [
            'medicijn' => $medicijn,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("medicijn/{id}", name="medicijn_show", methods={"GET"})
     */
    public function show(Medicijn $medicijn): Response
    {
        return $this->render('medicijn/show.html.twig', [
            'medicijn' => $medicijn,
        ]);
    }

    /**
     * @Route("medicijn/{id}/edit", name="medicijn_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Medicijn $medicijn): Response
    {
        $form = $this->createForm(MedicijnType::class, $medicijn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('medicijn_index');
        }

        return $this->render('medicijn/edit.html.twig', [
            'medicijn' => $medicijn,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("medicijn/{id}", name="medicijn_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Medicijn $medicijn): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medicijn->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($medicijn);
            $entityManager->flush();
        }

        return $this->redirectToRoute('medicijn_index');
    }




    /**
     * @Route("recept/", name="recept_index", methods={"GET"})
     */
    public function indexRecept(ReceptRepository $receptRepository): Response
    {
        return $this->render('recept/index.html.twig', [
            'recepts' => $receptRepository->findAll(),
        ]);
    }

    /**
     * @Route("recept/new", name="recept_new", methods={"GET","POST"})
     */
    public function newRecept(Request $request): Response
    {
        $recept = new Recept();
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recept);
            $entityManager->flush();

            return $this->redirectToRoute('recept_index');
        }

        return $this->render('recept/new.html.twig', [
            'recept' => $recept,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("recept/{id}", name="recept_show", methods={"GET"})
     */
    public function showRecept(Recept $recept): Response
    {
        return $this->render('recept/show.html.twig', [
            'recept' => $recept,
        ]);
    }

    /**
     * @Route("recept/{id}/edit", name="recept_edit", methods={"GET","POST"})
     */
    public function editRecept(Request $request, Recept $recept): Response
    {
        $form = $this->createForm(ReceptType::class, $recept);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recept_index');
        }

        return $this->render('recept/edit.html.twig', [
            'recept' => $recept,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("recept/{id}", name="recept_delete", methods={"DELETE"})
     */
    public function deleteRecept(Request $request, Recept $recept): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recept->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recept);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recept_index');
    }
}