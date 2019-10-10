<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * QuoteAPI
 *
 * @ORM\Table(name="quote_a_p_i")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuoteAPIRepository")
 */
class QuoteAPI
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="quote", type="string", length=255)
     */
    public $quote;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    public $source;


      /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    public $genre;


    /**
     * @var string
     *
     * @ORM\Column(name="country_origin", type="string", length=255)
     */
    public $country_origin;

    /**
     * @var string
     *
     * @ORM\Column(name="author_profession", type="string", length=255)
     */
    public $author_profession;


    /**
    * @var   @Assert\DateTime
    * @ORM\Column(type="datetime")
     * @ORM\Column(name="updated_at", type="datetime")
     */
    public $updated_at;


    /**
    * @var   @Assert\DateTime
    * @ORM\Column(type="datetime")
    */
      public $created_at;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set quote.
     *
     * @param string $quote
     *
     * @return QuoteAPI
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * Get quote.
     *
     * @return string
     */
    public function getQuote()
    {
        return $this->quote;
    }
      /**
     * Get genre.
     *
     * @return int
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set genre.
     *
     * @return int
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }



    /**
     * Set source.
     *
     * @param string $source
     *
     * @return QuoteAPI
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }


 
    /**
     * Set country origin.
     *
     * @return  string
     */
    public function setCountryOrigin($country_origin)
    {
        $this->country_origin = $country_origin;

        return $this;
    }



      /**
     * Get country origin.
     *
     * @return string
     */
    public function getCountryOrigin()
    {
        return $this->country_origin;
    }

  

    #http://127.0.0.1:8000/api/v1/quote?quote=hewholaughswsins&source=cnn&author=james+cleverly&author_profession=MP&genre=focus&country_origin=UKKKK


    /**
     * Get author profession.
     *
     * @return string
     */
    public function getAuthorProfession()
    {
        return $this->author_profession;
    }

    /**
     * Set author profession..
     *
     * @return string
     */
    public function setAuthorProfession($author_profession)
    {
        $this->author_profession = $author_profession;

        return $this;
    }


    /**
     * Get create date.
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set created date.
     *
     * @return string
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    /**
     * Get create date.
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated date.
     *
     * @return string
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }


}

