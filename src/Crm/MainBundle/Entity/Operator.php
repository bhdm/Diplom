<?php

namespace Crm\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Operator
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="OperatorRepository")
 */
class Operator extends BaseEntity implements UserInterface
{

    /**
     * @ORM\ManyToOne(targetEntity="Operator", inversedBy="operators")
     */
    protected $moderator;

    /**
     * @ORM\OneToMany(targetEntity="Operator", mappedBy="moderator")
     */
    protected $operators;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\OneToMany(targetEntity="Company", mappedBy="operator", orphanRemoval=false)
     */
    protected $companies;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $roles;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPetition", mappedBy="operator", cascade={"all"})
     */
    protected $petitions;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPayment", mappedBy="operator", cascade={"all"})
     */
    protected $checks;

    /**
     * @ORM\OneToMany(targetEntity="CompanyPayment", mappedBy="moderator", cascade={"all"})
     */
    protected $payments;


    public function __construct(){
        $this->roles    = 'ROLE_OPERATOR';
        $this->companies = new ArrayCollection();
        $this->petitions = new ArrayCollection();
        $this->payments = new ArrayCollection();
        $this->checks = new ArrayCollection();
        $this->operators = new ArrayCollection();
    }

    public function getPaymentCount(){
        $summ = 0;
        foreach ($this->getChecks() as $val){
            $summ += $val->getCount();
        }

        foreach ($this->companies as $company){
            foreach ($company->getUsers() as $user ){
                if ($user->getProduction() > 0 ){
                    $summ --;
                }
            }
        }

        return $summ;
    }

    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    public function __toString()
    {
        return $this->username;
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
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param mixed $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
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

    public function addCompany($company){
        $this->companies[] = $company;
    }

    public function removeCompany($company){
        $this->companies->removeElement($company);
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
     * @param mixed $petitions
     */
    public function setPetitions($petitions)
    {
        $this->petitions = $petitions;
    }

    /**
     * @return mixed
     */
    public function getPetitions()
    {
        return $this->petitions;
    }

    public function addPetition($petition){
        $this->petitions[] = $petition;
    }

    public function removePetition($petition){
        $this->petitions->removeElement($petition);
    }

    /**
     * @param mixed $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    public function addPayment($payment){
        $this->payments[] = $payment;
    }

    public function removePayment($payment){
        $this->payments->removeElement($payment);
    }

    /**
     * @param mixed $moderator
     */
    public function setModerator($moderator)
    {
        $this->moderator = $moderator;
    }

    /**
     * @return mixed
     */
    public function getModerator()
    {
        return $this->moderator;
    }

    /**
     * @param mixed $operators
     */
    public function setOperators($operators)
    {
        $this->operators = $operators;
    }

    /**
     * @return mixed
     */
    public function getOperators()
    {
        return $this->operators;
    }

    public function addOperator($operator){
        $this->operators[] = $operator;
    }

    public function removeOperator($operator){
        $this->operators->removeElement($operator);
    }

    public function isRoles($role){
        foreach ( $this->getRoles() as $title ){
            if ($title == $role){
                return true;
            }
        }
        return false;
    }

    /**
     * @param mixed $checks
     */
    public function setChecks($checks)
    {
        $this->checks = $checks;
    }

    /**
     * @return mixed
     */
    public function getChecks()
    {
        return $this->checks;
    }


}