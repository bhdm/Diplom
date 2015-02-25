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
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Название договора обязательно для заполнения" )
     */
    protected $title;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Дата заключения обязательно для заполнения" )
     */
    protected $dateStarts;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank( message = "поле Дата окончания обязательно для заполнения" )
     */
    protected $dateEnds;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

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
    public function getDateStarts()
    {
        return $this->dateStarts;
    }

    /**
     * @param mixed $dateStarts
     */
    public function setDateStarts($dateStarts)
    {
        $this->dateStarts = $dateStarts;
    }

    /**
     * @return mixed
     */
    public function getDateEnds()
    {
        return $this->dateEnds;
    }

    /**
     * @param mixed $dateEnds
     */
    public function setDateEnds($dateEnds)
    {
        $this->dateEnds = $dateEnds;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }






}
