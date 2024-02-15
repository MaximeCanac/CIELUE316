<?php
// src/Controller/ProduitController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitRepository;
use Knp\Component\Pager\PaginatorInterface;


class ProduitController extends AbstractController
{
    #[Route('/produits', name: 'produit_index')]
    public function index(ProduitRepository $produitRepository, PaginatorInterface $paginator,Request $request): Response
    {
        $produits = $paginator->paginate(
            $produitRepository->findAll(), // Query pour récupérer tous les produits
            $request->query->getInt('page', 1), // Numéro de la page, par défaut 1
            4 // Nombre d'éléments par page
        );

        return $this->render('produit/index.html.twig', [
            'produits' => $produits,
        ]);
    }
}
