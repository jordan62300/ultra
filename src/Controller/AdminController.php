<?php

namespace App\Controller;

use App\Entity\Chapitres;
use App\Entity\Mangas;
use App\Entity\Pages;
use App\Form\AdminValidationMangaFormType;
use App\Form\AdminValidationChapitreFormType;
use App\Form\AdminValidationPageFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {

        $mangas = $this->getDoctrine()->getRepository(Mangas::class)->findAll();
        $chapitres = $this->getDoctrine()->getRepository(Chapitres::class)->findAll();
        $pages = $this->getDoctrine()->getRepository(Pages::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'mangas' => $mangas,
            'chapitres' => $chapitres,
            'pages' => $pages
        ]);
    }

    /**
     * @Route("/admin/editManga/{id}", name="admin_edit_manga")
     */
    public function editManga(Mangas $manga = null, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(AdminValidationMangaFormType::class, $manga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($manga);
            $manager->flush();
        }
        return $this->render('admin/editManga.html.twig', [
            'manga' => $manga,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/editChapitre/{id}", name="admin_edit_chapitre")
     */
    public function editChapitre(Chapitres $chapitre = null, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(AdminValidationChapitreFormType::class, $chapitre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($chapitre);
            $manager->flush();
        }
        return $this->render('admin/editChapitre.html.twig', [
            'chapitre' => $chapitre,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/editPage/{id}", name="admin_edit_page")
     */
    public function editPage(Pages $page = null, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(AdminValidationPageFormType::class, $page);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($page);
            $manager->flush();
        }
        return $this->render('admin/editPage.html.twig', [
            'page' => $page,
            'form' => $form->createView()
        ]);
    }
}
