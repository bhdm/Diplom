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
class Supplier extends BaseEntity
{
    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Название обязательно для заполнения" )
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Полное название обязательно для заполнения" )
     */
    protected $fullTitle;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $contract;

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
     * @ORM\Column(type="string", length=12)
     * @Assert\NotBlank( message = "поле ИНН обязательно для заполнения" )
     */
    protected $inn;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank( message = "поле ОГРН обязательно для заполнения" )
     */
    protected $ogrn;

    /**
     * @ORM\Column(type="string", length=9)
     * @Assert\NotBlank( message = "поле КПП обязательно для заполнения" )
     */
    protected $kpp;

    /**
     * @ORM\Column(type="string", length=24)
     * @Assert\NotBlank( message = "поле БИК обязательно для заполнения" )
     */
    protected $bik;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Кор. счет обязательно для заполнения" )
     */
    protected $expense;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank( message = "поле Кор. счет обязательно для заполнения" )
     */
    protected $ExpenseBank;

    /**
     * @ORM\Column(type="string", length=250)
     * @Assert\NotBlank( message = "поле Отделение банка обязательно для заполнения" )
     */
    protected $bank;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $comment;

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
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
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
    public function getOgrn()
    {
        return $this->ogrn;
    }

    /**
     * @param mixed $ogrn
     */
    public function setOgrn($ogrn)
    {
        $this->ogrn = $ogrn;
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
    public function getBik()
    {
        return $this->bik;
    }

    /**
     * @param mixed $bik
     */
    public function setBik($bik)
    {
        $this->bik = $bik;
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

    /**
     * @return mixed
     */
    public function getFullTitle()
    {
        return $this->fullTitle;
    }

    /**
     * @param mixed $fullTitle
     */
    public function setFullTitle($fullTitle)
    {
        $this->fullTitle = $fullTitle;
    }

    /**
     * @return mixed
     */
    public function getExpenseBank()
    {
        return $this->ExpenseBank;
    }

    /**
     * @param mixed $ExpenseBank
     */
    public function setExpenseBank($ExpenseBank)
    {
        $this->ExpenseBank = $ExpenseBank;
    }


    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }



}