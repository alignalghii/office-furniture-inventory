<?php

namespace App\Controller;

use App\Entity\IUser;
use App\Form\IUserType;
use App\Repository\IUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/iuser")
 */
class IUserController extends AbstractController
{
    /**
     * @Route("/", name="i_user_index", methods={"GET"})
     */
    public function index(IUserRepository $iUserRepository): Response
    {
        return $this->render('i_user/index.html.twig', [
            'i_users' => $iUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="i_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $iUser = new IUser();
        $form = $this->createForm(IUserType::class, $iUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($iUser);
            $entityManager->flush();

            return $this->redirectToRoute('i_user_index');
        }

        return $this->render('i_user/new.html.twig', [
            'i_user' => $iUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="i_user_show", methods={"GET"})
     */
    public function show(IUser $iUser): Response
    {
        return $this->render('i_user/show.html.twig', [
            'i_user' => $iUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="i_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, IUser $iUser): Response
    {
        $form = $this->createForm(IUserType::class, $iUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('i_user_index');
        }

        return $this->render('i_user/edit.html.twig', [
            'i_user' => $iUser,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="i_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, IUser $iUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$iUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($iUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('i_user_index');
    }
}
