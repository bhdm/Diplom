<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник Заявок
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Order extends BaseEntity
{
    /**
     * @ORM\Column(type="boolean")
     */
    protected $type = true;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="orders")
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Work", mappedBy="orders")
     */
    protected $works;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $ends;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endsFact;

    public function __construct(){
        $this->works = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getEnds()
    {
        return $this->ends;
    }

    /**
     * @param mixed $ends
     */
    public function setEnds($ends)
    {
        $this->ends = $ends;
    }

    /**
     * @return mixed
     */
    public function getEndsFact()
    {
        return $this->endsFact;
    }

    /**
     * @param mixed $endsFact
     */
    public function setEndsFact($endsFact)
    {
        $this->endsFact = $endsFact;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getWorks()
    {
        return $this->works;
    }

    /**
     * @param mixed $works
     */
    public function setWorks($works)
    {
        $this->works = $works;
    }

    public function addWork($work){
        $this->works[] = $work;
    }

    public function removeWork($work){
        $this->works->removeElement($work);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type = true)
    {
        $this->type = $type;
    }


}