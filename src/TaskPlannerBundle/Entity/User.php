<?php

namespace TaskPlannerBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
        /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user")
     * 
     */
    
    private $tasks;   

    public function __construct() {

        parent::__construct();
        
    }
    

    /**
     * Add tasks
     *
     * @param \TaskPlannerBundle\Entity\Task $tasks
     * @return User
     */
    public function addTask(\TaskPlannerBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \TaskPlannerBundle\Entity\Task $tasks
     */
    public function removeTask(\TaskPlannerBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
