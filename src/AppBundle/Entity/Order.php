<?php
namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Справочник Заявок
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Order extends BaseEntity
{

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $ends;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endsFact;

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
    public function getEndsFact()
    {
        return $this->endsFact;
    }

    /**
     * @param mixed $endsFact
     */
    public function setEndsFact($endsFact)
    {
        $this->endsFact = $endsFact;
    }


}