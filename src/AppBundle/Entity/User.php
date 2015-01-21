<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class User extends BaseEntity implements UserInterface
{

    /**
     * @ORM\OneToMany(targetEntity="Contract", mappedBy="user")
     */
    protected $contracts;

    /**
     * @ORM\OneToMany(targetEntity="Order", mappedBy="user")
     */
    protected $orders;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank( message = "поле E-mail обязательно для заполнения" )
     */
    protected $username;

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

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank( message = "поле пароль обязательно для заполнения" )
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank( message = "поле Должность обязательно для заполнения" )
     */
    protected $jobTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $ads;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank( message = "поле Паспортные данные обязательно для заполнения" )
     */
    protected $passport;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $roles;

    public function __construct(){
        $this->roles    = 'ROLE_OPERATOR';
        $this->orders = new ArrayCollection();
    }

    static public function getRolesNames(){
        return array(
            "ROLE_OPERATOR" => "Оператор",
        );
    }

    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    public function __toString()
    {
        return $this->lastName.' '.$this->firstName.' '.$this->surName;
    }

    /**
     * @return mixed
     */
    public function getRoles()
    {
        return explode(';', $this->roles);
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
     * Сброс прав пользователя.
     */
    public function eraseCredentials()
    {
        return true;
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
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param mixed $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
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
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
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
    public function getLastName()
    {
        return $this->lastName;
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
    public function getSurName()
    {
        return $this->surName;
    }

    public function getUserRoles(){
        return $this->roles[0];
    }

    public function setUserRoles($role){
        $this->roles = $role;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
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
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * @param mixed $passport
     */
    public function setPassport($passport)
    {
        $this->passport = $passport;
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


}