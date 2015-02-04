<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник работ
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Work extends BaseEntity
{

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank( message = "поле Название работы обязательно для заполнения" )
     */
    protected $title;




    /**
     * @ORM\manyToOne(targetEntity="Order", inversedBy="works")
     */
    protected $order;

    /**
     * @ORM\ManyToMany(targetEntity="Contract", mappedBy="works")
     */
    protected $contracts;


    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Дата начала работ обязательно для заполнения" )
     */
    protected $starts;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Дата окончания работ обязательно для заполнения" )
     */
    protected $ends;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Факт. дата окончания работ обязательно для заполнения" )
     */
    protected $endsFact;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Ответственный обязательно для заполнения" )
     */
    protected $responsible;


    public function __construct(){
        $this->contracts = new ArrayCollection();
    }

    public function __toString(){
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getStarts()
    {
        return $this->starts;
    }

    /**
     * @param mixed $starts
     */
    public function setStarts($starts)
    {
        $this->starts = $starts;
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
    public function getResponsible()
    {
        return $this->responsible;
    }

    /**
     * @param mixed $responsible
     */
    public function setResponsible($responsible)
    {
        $this->responsible = $responsible;
    }

    /**
     * @return mixed
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param mixed $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
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



}
