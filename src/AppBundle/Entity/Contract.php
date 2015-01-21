<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник договоров
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Contract extends BaseEntity
{

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="contracts")
     */
    protected $order;

    /**
     * @ORM\ManyToMany(targetEntity="Work", inversedBy="contracts")
     */
    protected $works;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="contracts")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="contracts")
     */
    protected $company;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Номер договора обязательно для заполнения" )
     */
    protected $number;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Дата заключения обязательно для заполнения" )
     */
    protected $date;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Срок действия договора обязательно для заполнения" )
     */
    protected $length;

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->length = $length;
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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }



}
