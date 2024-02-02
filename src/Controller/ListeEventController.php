<?php

namespace App\Controller;

use App\Entity\ListeEvent;
use App\Form\ListeEventType;
use App\Repository\BateauRepository;
use App\Repository\ListeEventRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/liste_event')]
class ListeEventController extends AbstractController
{
    #[Route('/', name: 'app_liste_event_index', methods: ['GET'])]
    public function index(ListeEventRepository $listeEventRepository): Response
    {
        return $this->render('liste_event/index.html.twig', [
            'liste_events' => $listeEventRepository->findAll(),
        ]);
    }

    #[Route( '/calendar', name: "app_booking_calendar", methods: ['GET'])]
    public function calendar(BateauRepository $bateauRepository): Response
    {
        $bateaux = $bateauRepository->findAll();

        return $this->render('liste_event/calendar.html.twig', [
            'bateaux' => $bateaux,
        ]);
    }

    #[Route( '/calendar2', name: "app_booking_calendar2", methods: ['GET'])]
    public function calendar2(BateauRepository $bateauRepository): Response
    {
        $bateaux = $bateauRepository->findAll();

        return $this->render('liste_event/calendar2.html.twig', [
            'bateaux' => $bateaux,
        ]);
    }

    #[Route( '/calendar3', name: "app_booking_calendar3", methods: ['GET'])]
    public function calendar3(BateauRepository $bateauRepository): Response
    {
        $bateaux = $bateauRepository->findAll();

        return $this->render('liste_event/calendar3.html.twig', [
            'bateaux' => $bateaux,
        ]);
    }



    


    #[Route('/new', name: 'app_liste_event_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $listeEvent = new ListeEvent();
        $form = $this->createForm(ListeEventType::class, $listeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($listeEvent);
            $entityManager->flush();

            return $this->redirectToRoute('app_liste_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('liste_event/new.html.twig', [
            'liste_event' => $listeEvent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_liste_event_show', methods: ['GET'])]
    public function show(ListeEvent $listeEvent): Response
    {
        return $this->render('liste_event/show.html.twig', [
            'liste_event' => $listeEvent,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_liste_event_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ListeEvent $listeEvent, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ListeEventType::class, $listeEvent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_liste_event_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('liste_event/edit.html.twig', [
            'liste_event' => $listeEvent,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_liste_event_delete', methods: ['POST'])]
    public function delete(Request $request, ListeEvent $listeEvent, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$listeEvent->getId(), $request->request->get('_token'))) {
            $entityManager->remove($listeEvent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_liste_event_index', [], Response::HTTP_SEE_OTHER);
    }
}
