<?php

namespace Crm\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * User
 *
 * @ORM\Table("user")
 * @ORM\Entity
 */
class User extends BaseEntity implements UserInterface, EquatableInterface, \Serializable
{
    /**
     * @ORM\OneToOne(targetEntity="Driver", mappedBy="user")
     */
    protected $driver;

    /**
     * @ORM\OneToOne(targetEntity="Company", mappedBy="user")
     */
    protected $company;

    /**
     * @Assert\NotBlank( message = "Поле фамилия обязательно для заполнения" )
     * @ORM\Column(type="string", length=100)
     */
    protected  $lastName;

    /**
     * @Assert\NotBlank( message = "Поле имя обязательно для заполнения" )
     * @ORM\Column(type="string", length=100)
     */
    protected  $firstName;

    /**
     * @Assert\NotBlank( message = "Поле отчество обязательно для заполнения" )
     * @ORM\Column(type="string", length=100)
     */
    protected  $surName;

    /**
     * @Assert\NotBlank( message = "Поле фамилия латиницей обязательно для заполнения" )
     * @ORM\Column(type="string", length=100)
     */
    protected  $latLatsName;

    /**
     * @Assert\NotBlank( message = "Поле имя латиницей обязательно для заполнения" )
     * @ORM\Column(type="string", length=100)
     */
    protected  $latFirstName;

    /**
     * @Assert\NotBlank( message = "Поле дата рождения обязательно для заполнения" )
     * @ORM\Column(type="datetime", length=100)
     */
    protected  $birthDate;

    /**
     * @Assert\Regex(pattern= "/^[0-9\(\)\-\+\ ]+$/", message="Неверный формат ввода.")
     * @Assert\NotBlank( message = "Поле телефон обязательно для заполнения" )
     * @ORM\Column(type="string", length=15)
     */
    protected  $username;

    /**
     * @Assert\NotBlank( message = "Поле E-mail обязательно для заполнения" )
     * @Assert\Regex(pattern= "/^[_A-Za-z0-9-\+]+(\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{1,})$/", message="Неверный формат ввода.")
     * @ORM\Column(type="string", length=15)
     */
    protected  $email;

    # Паспорт

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $passportSerial;

    /**
     * @Assert\NotBlank( message = "Поле номер паспорта обязательно для заполнения" )
     * @ORM\Column(type="string", length=50)
     */
    protected $passportNumber;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $passportIssuance;

    /**
     * @Assert\NotBlank( message = "Поле дата выдачи паспорта обязательно для заполнения" )
     * @ORM\Column(type="datetime")
     */
    protected $passportIssuanceDate;

    /** Код подразделения
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $passportCode;

    # Водительское удостоверение

    /**
     * @Assert\NotBlank( message = "Поле Номер водительского удостоверения обязательно для заполнения" )
     * @Assert\Regex(pattern= "/^[0-9]{2}[А-Я|0-9]{2}[0-9]{6}$/", message="Неверный формат ввода.")
     * @ORM\Column(type="string")
     */
    protected $driverDocNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="driverDocCountries")
     */
    protected $driverDocCountry;

    /**
     * @Assert\NotBlank( message = "Поле кем выдано водительское удостоверение обязательно для заполнения" )
     * @ORM\Column(type="string")
     */
    protected $driverDocIssuance;

    /**
     * @Assert\NotBlank( message = "Поле дата выдачи водительского удостоверения обязательно для заполнения" )
     * @ORM\Column(type="datetime")
     */
    protected $driverDocDateStarts;

    /**
     * @Assert\NotBlank( message = "Поле действителен до (водительское удостоверение) обязательно для заполнения" )
     * @ORM\Column(type="datetime")
     */
    protected $driverDocDateEnds;




    /**
     * @Assert\NotBlank( message = "Поле пароль обязательно для заполнения" )
     * @ORM\Column(type="string", length=25)
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     * @var string salt
     */
    protected $salt;

    /**
     * @Assert\NotBlank( message = "Поле СНИЛС обязательно для заполнения" )
     * @Assert\Regex(pattern= "/^[0-9]{11}$/", message="Неверный формат ввода.")
     * @ORM\Column(type="string")
     */
    protected $snils;

    /**
     * @Assert\Regex(pattern= "/^RU[DMP][A-Z0-9]{13}$/", message="Неверный формат ввода.")
     * @ORM\Column(type="string", nullable=true)
     */
    protected $lastNumberCard;

    /**
     * @ORM\Column(type="string")
     */
    protected $roles;

    public function __construct(){
        $this->roles    = 'ROLE_UNCONFIRMED';
    }

    public function __toString()
    {
        return $this->lastName . ' '
        . mb_substr($this->firstName, 0, 1, 'utf-8') . '.'
        . ($this->surName ? ' ' . mb_substr($this->surName, 0, 1, 'utf-8') . '.' : '');
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
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
    public function getLatFirstName()
    {
        return $this->latFirstName;
    }

    /**
     * @param mixed $latFirstName
     */
    public function setLatFirstName($latFirstName)
    {
        $this->latFirstName = $latFirstName;
    }

    /**
     * @return mixed
     */
    public function getLatLatsName()
    {
        return $this->latLatsName;
    }

    /**
     * @param mixed $latLatsName
     */
    public function setLatLatsName($latLatsName)
    {
        $this->latLatsName = $latLatsName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        if (is_array($roles)) {
            $roles = implode($roles, ';');
        }

        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return explode(';', $this->roles);
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    public function addRole($role)
    {
        $roles = explode(';', $this->roles);

        if (array_search($role, $roles) === false) {
            $this->roles .= ';' . $role;
        }

        return $this;
    }

    public function removeRole($role)
    {
        $roles = explode(';', $this->roles);
        $key   = array_search($role, $roles);

        if ($key !== false) {
            unset($roles[$key]);
            $this->roles = implode($roles, ';');
        }
    }

    public function checkRole($role)
    {
        $roles = explode(';', $this->roles);

        return in_array($role, $roles);
    }

    /**
     * Сброс прав пользователя.
     */
    public function eraseCredentials()
    {
//        $this->roles = 'ROLE_UNCONFIRMED';
//        $this->password = null;
    }

    public function isEqualTo(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    /**
     * Сериализуем только id, потому что UserProvider сам перезагружает остальные свойства пользователя по его id
     *
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id
            ) = unserialize($serialized);
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
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    public function getPhone(){
        return $this->username;
    }

    public function setPhone($phone){
        $this->username = $phone;
    }

    /**
     * @param mixed $driverDocCountry
     */
    public function setDriverDocCountry($driverDocCountry)
    {
        $this->driverDocCountry = $driverDocCountry;
    }

    /**
     * @return mixed
     */
    public function getDriverDocCountry()
    {
        return $this->driverDocCountry;
    }

    /**
     * @param mixed $driverDocDateEnds
     */
    public function setDriverDocDateEnds($driverDocDateEnds)
    {
        $this->driverDocDateEnds = $driverDocDateEnds;
    }

    /**
     * @return mixed
     */
    public function getDriverDocDateEnds()
    {
        return $this->driverDocDateEnds;
    }

    /**
     * @param mixed $driverDocDateStarts
     */
    public function setDriverDocDateStarts($driverDocDateStarts)
    {
        $this->driverDocDateStarts = $driverDocDateStarts;
    }

    /**
     * @return mixed
     */
    public function getDriverDocDateStarts()
    {
        return $this->driverDocDateStarts;
    }

    /**
     * @param mixed $driverDocIssuance
     */
    public function setDriverDocIssuance($driverDocIssuance)
    {
        $this->driverDocIssuance = $driverDocIssuance;
    }

    /**
     * @return mixed
     */
    public function getDriverDocIssuance()
    {
        return $this->driverDocIssuance;
    }

    /**
     * @param mixed $driverDocNumber
     */
    public function setDriverDocNumber($driverDocNumber)
    {
        $this->driverDocNumber = $driverDocNumber;
    }

    /**
     * @return mixed
     */
    public function getDriverDocNumber()
    {
        return $this->driverDocNumber;
    }

    /**
     * @param mixed $lastNumberCard
     */
    public function setLastNumberCard($lastNumberCard)
    {
        $this->lastNumberCard = $lastNumberCard;
    }

    /**
     * @return mixed
     */
    public function getLastNumberCard()
    {
        return $this->lastNumberCard;
    }

    /**
     * @param mixed $passportCode
     */
    public function setPassportCode($passportCode)
    {
        $this->passportCode = $passportCode;
    }

    /**
     * @return mixed
     */
    public function getPassportCode()
    {
        return $this->passportCode;
    }

    /**
     * @param mixed $passportIssuance
     */
    public function setPassportIssuance($passportIssuance)
    {
        $this->passportIssuance = $passportIssuance;
    }

    /**
     * @return mixed
     */
    public function getPassportIssuance()
    {
        return $this->passportIssuance;
    }

    /**
     * @param mixed $passportIssuanceDate
     */
    public function setPassportIssuanceDate($passportIssuanceDate)
    {
        $this->passportIssuanceDate = $passportIssuanceDate;
    }

    /**
     * @return mixed
     */
    public function getPassportIssuanceDate()
    {
        return $this->passportIssuanceDate;
    }

    /**
     * @param mixed $passportNumber
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;
    }

    /**
     * @return mixed
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * @param mixed $passportSerial
     */
    public function setPassportSerial($passportSerial)
    {
        $this->passportSerial = $passportSerial;
    }

    /**
     * @return mixed
     */
    public function getPassportSerial()
    {
        return $this->passportSerial;
    }

    /**
     * @param mixed $snils
     */
    public function setSnils($snils)
    {
        $this->snils = $snils;
    }

    /**
     * @return mixed
     */
    public function getSnils()
    {
        return $this->snils;
    }


}
