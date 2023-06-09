<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Ride;

#[Route('/liste')]

class ListeController extends AbstractController
{
    #[Route('/', name: 'app_liste')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $rideRepository = $entityManager->getRepository(Ride::class);
        $rides = $rideRepository->findAll();
        return $this->render('liste/liste.html.twig', [
            'controller_name' => "Liste d'annonces",
            'homeTitle' => "chamBlaCar",
            'rides' => $rides,
            
        ]);
    }
}
