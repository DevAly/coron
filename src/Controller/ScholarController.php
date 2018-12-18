<?php

namespace App\Controller;

use App\Repository\ScholarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ScholarController extends AbstractController
{

    public function __construct(ScholarRepository $scholarRepository) {
       $this->scholarRepository  = $scholarRepository;
    }

    /**
     * @Route("/scholar", name="scholar")
     */
    public function index()
    {
        return $this->render('scholar/index.html.twig', [
            'controller_name' => 'ScholarController',
        ]);
    }
    /**
     * @Route("/scholar/{slug}", name="scholar_profile")
     */
    public function artistAction($slug)
    {
        $artist = $this->scholarRepository->findByslug($slug);
        if (!$artist) {
            throw $this->createNotFoundException(
                'لم يتم العثور على باحث '.$slug
            );
        }

        return $this->render('scholar/artist.html.twig', [
            'artist' => $artist,
        ]);
    }
}
