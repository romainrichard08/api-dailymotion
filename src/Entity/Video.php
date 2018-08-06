<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Video
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thumbnail;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_view;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_like;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_dislike;


    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        return $this->description;
    }

    public function setContent($description)
    {
        $this->$description = $description;

        return $this;
    }

    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function setThumbnail($thumbnail)
    {
        $this->$thumbnail = $thumbnail;

        return $this;
    }

    public function getNbViews()
    {
        return $this->nb_view;
    }

    public function setNbView($nb_view)
    {
        $this->$nb_view = $nb_view;

        return $this;
    }
    public function getNbLike()
    {
        return $this->nb_like;
    }

    public function setNbLike($nb_like)
    {
        $this->nb_like = $nb_like;

        return $this;
    }
    public function getNbDislike()
    {
        return $this->nb_dislike;
    }

    public function setNbDislike($nb_dislike)
    {
        $this->nb_dislike = $nb_dislike;
        return $this;
    }

}