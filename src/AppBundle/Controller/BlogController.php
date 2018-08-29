<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * Matches /blog exactly
     *
     * @Route("/blog", name="blog_list",requirements={"page"="\d+"})
     */
    public function listAction()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: ' . $number . '</body></html>'
        );
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function showAction($slug)
    {
        return $this->render('base.html.twig', array(
            'name' => $slug,
        ));
    }

    /**
     * Matches /blog/*
     *
     * @Route("/blog/first/{slug}", name="blog_first")
     */
    public function firstAction($slug)
    {
        return $this->render('base.html.twig', array(
            'name' => $slug,
        ));
    }

    /**
     * Matches /blog/new
     *
     * @Route("/blog/new", name="blog_new", methods="POST")
     */
    public function newAction()
    {
        return new Response('Created post!!! id = ' . rand(1, 10e6), 201);
    }

    /**
     * Matches /blog/edit/{slug}
     *
     * @Route("/blog/edit/{slug}", name="blog_edit", methods="PUT")
     */
    public function editAction($slug)
    {
        return new Response('Edited post ' . $slug . '!!!');
    }

    /**
     * Matches /blog/delete/{slug}
     *
     * @Route("/blog/delete/{slug}", name="blog_delete", methods="DELETE")
     */
    public function deleteAction($slug)
    {
        return new Response('Deleted post ' . $slug . '!!!');
    }
}