<?php
namespace VenueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @MongoDB\Document(collection="Venue")
 */

class Platforms implements UserInterface, \Serializable {
    
    /**
     *@MongoDB\Id
     */
    private $id;
    
    /**
     *@MongoDB\Field(name="VenueUser", type="string")
     */
    private $username;
    
    /**
     *@MongoDB\Field(name="VenuePassword", type="string")
     */
    private $password;
    
    /**
     *@MongoDB\Field(name="email", type="string")
     */
    private $email;
    
    /**
     *@MongoDB\Field(name="Roles")
     */
    private $roles;
    
    /**
     *@MongoDB\Field(name="is_active", type="boolean")
     */
    private $isActive;
    
    public function __construct()
    {
        $this->isActive = true;
        $this->roles = array();
        // may not be needed, see section on salt below
        // $this->salt = md5(uniqid(null, true));
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    
    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getRoles()
    {
        $roles = $this->roles;
        return array($roles);
    }
    
    public function eraseCredentials()
    {
    }
    
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }
    
    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    
    /**
     * Set Role
     *
     */
    public function setRole($role)
    {
        $role = strtoupper($role);
        $roles = $this->getRoles();
        return $this;
    }
    
    /**
     * Set password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return self
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean $isActive
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return self
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }
}
