<?php

namespace Acme\JokeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * jokes_list
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Acme\JokeBundle\Entity\jokes_listRepository")
 */
class JokesList
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var text 
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $userid;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $createtime;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return jokes_list
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     * @return jokes_list
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set createtime
     *
     * @param \DateTime $createtime
     * @return jokes_list
     */
    public function setCreatetime($createtime)
    {
        $this->createtime = $createtime;

        return $this;
    }

    /**
     * Get createtime
     *
     * @return \DateTime 
     */
    public function getCreatetime()
    {
        return $this->createtime;
    }
}
