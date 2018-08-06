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
    public function showAction()
    {
        $video = new Video();
        $video
            ->setTitle('First video')
            ->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. ');
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
}