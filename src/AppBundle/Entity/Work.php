<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Справочник работ
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Work extends BaseEntity
{
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
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Ответственный обязательно для заполнения" )
     */
    protected $responsible;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank( message = "поле Контактная информация обязательно для заполнения" )
     */
    protected $contacts;

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


}
