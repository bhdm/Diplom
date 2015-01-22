<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Справочник подрядчиков
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Company extends BaseEntity
{

    /**
     * @ORM\OneToMany(targetEntity="Contract", mappedBy="company")
     */
    protected $contracts;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Название обязательно для заполнения" )
     */
    protected $title;

//    /**
//     * @ORM\Column(type="string", length=250)
//     * @Assert\NotBlank( message = "поле Вид деятельности обязательно для заполнения" )
//     */
//    protected $type;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $license;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Адрес обязательно для заполнения" )
     */
    protected $ads;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Телефон обязательно для заполнения" )
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Контактное лицо обязательно для заполнения" )
     */
    protected $contact;

    /**
     * @ORM\Column(type="string", length=12)
     * @Assert\NotBlank( message = "поле ИНН обязательно для заполнения" )
     */
    protected $inn;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\NotBlank( message = "поле КПП обязательно для заполнения" )
     */
    protected $kpp;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Кор. счет обязательно для заполнения" )
     */
    protected $expense;

    public function __construct(){
        $this->contracts = new ArrayCollection();
    }

    public function __toString(){
        return $this->title;
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
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param mixed $license
     */
    public function setLicense($license)
    {
        $this->license = $license;
    }

    /**
     * @return mixed
     */
    public function getAds()
    {
        return $this->ads;
    }

    /**
     * @param mixed $ads
     */
    public function setAds($ads)
    {
        $this->ads = $ads;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * @param mixed $inn
     */
    public function setInn($inn)
    {
        $this->inn = $inn;
    }

    /**
     * @return mixed
     */
    public function getKpp()
    {
        return $this->kpp;
    }

    /**
     * @param mixed $kpp
     */
    public function setKpp($kpp)
    {
        $this->kpp = $kpp;
    }

    /**
     * @return mixed
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param mixed $expense
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
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

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
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



}