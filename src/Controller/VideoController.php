<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class VideoController extends Controller
{
    /**
     * @Route("/video/{id}", name="video_show")
     */
    public function showAction(Video $video)
    {
        $data = $this->get('jms_serializer')->serialize($video, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/video", name="video_create")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $video = $this->get('jms_serializer')->deserialize($data, 'App\Entity\Video', 'json');

        $em = $this->getDoctrine()->getManager();
        $em->persist($video);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("/video", name="video_list")
     * @Method({"GET"})
     */
    public function listAction()
    {
        $video = $this->getDoctrine()->getRepository('App\Entity\Video')->findAll();
        $data = $this->get('jms_serializer')->serialize($video, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/video/{id}", name="video_show")
     * @Method({"DELETE"})
     */
    public function deleteAction($id)
    {
       // $video = $this->getDoctrine()->getRepository('App\Entity\Video')->find($id);
        $data = $this->get('jms_serializer')->serialize($id, 'json');

       // $response = new Response($data);
        $data->remove($id);
        $data->flush();

        return new Response('', Response::HTTP_OK);



    }
}