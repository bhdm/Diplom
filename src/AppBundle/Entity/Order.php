<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник Заявок
 *
 * @ORM\Table(name="Request")
 * @ORM\Entity()
 */
class Order extends BaseEntity
{
    /**
     * @ORM\Column(type="boolean")
     */
    protected $closed = true;

    /**
     * @ORM\OneToMany(targetEntity="Contract", mappedBy="order")
     */
    protected $contracts;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="orders")
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Work", mappedBy="order")
     */
    protected $works;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $ends;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank( message = "поле Описание заявки обязательно для заполнения" )
     */
    protected $body;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endsFact;

    public function __toString(){
        return $this->created->format('d.m.Y').' '.$this->client;
    }

    public function __construct(){
        $this->works = new ArrayCollection();
        $this->contracts = new ArrayCollection();
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
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @param mixed $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * @return mixed
     */
    public function getContracts()
    {
        return $this->contracts;
    }

    /**
     * @param mixed $contracts
     */
    public function setContracts($contracts)
    {
        $this->contracts = $contracts;
    }



    public function addContract($contract){
        $this->contracts[] = $contract;
    }

    public function removeContract($contract){
        $this->contracts->removeElement($contract);
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }



}