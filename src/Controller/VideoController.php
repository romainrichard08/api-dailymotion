<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

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
}


}