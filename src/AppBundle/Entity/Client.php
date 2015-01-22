<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник клиентов
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Client extends BaseEntity
{

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="client")
     */
    protected $orders;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank( message = "поле Номер квартиры обязательно для заполнения" )
     */
    protected $room;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank( message = "поле Фамилия обязательно для заполнения" )
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank( message = "поле Имя обязательно для заполнения" )
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $surName;

    public function __construct(){
        $this->orders = new ArrayCollection();
    }

    public function __toString(){
        return $this->lastName.' '.$this->firstName.' '.$this->surName;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getSurName()
    {
        return $this->surName;
    }

    /**
     * @param mixed $surName
     */
    public function setSurName($surName)
    {
        $this->surName = $surName;
    }

    /**
     * @return mixed
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param mixed $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    public function addOrder($order){
        $this->orders[] = $order;
    }

    public function removeOrder($order){
        $this->orders->removeElement($order);
    }
}