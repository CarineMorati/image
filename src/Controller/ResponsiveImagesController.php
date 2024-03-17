<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ResponsiveImagesController extends AbstractController
{
    #[Route('/responsive', name: 'app_responsive_images')]
    public function index(): Response
    {


        // Chemin du répertoire contenant les images
        $imagesFolder = '../public/images/';
                
        // Utiliser Symfony Finder pour récupérer les images
        $finder = new \Symfony\Component\Finder\Finder();
        $finder->files()->in($imagesFolder)->name(['*.jpg', '*.jpeg', '*.png']);

        // Tableau pour stocker les chemins des images
        $images = [];
        
        // Ajouter chaque image dans le tableau
        foreach ($finder as $file) {
            $images[] = $file->getRelativePathname();
          
        }  

   // Rendre la vue avec le fichier HTML et les images
   return $this->render('/responsive_images/responsive_images.html.twig', [
       'images' => $images,
   ]);













        return $this->render('responsive_images/responsive_images.html.twig', [
            'controller_name' => 'ResponsiveImagesController',
        ]);
    }





}
