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


}
