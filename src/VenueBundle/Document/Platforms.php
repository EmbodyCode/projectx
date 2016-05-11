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
    
    /**
     *@MongoDB\Field(name="ShortTitle", type="string")
     */
    private $shortTitle;
    
    /**
     *@MongoDB\Field(name="updatedAt", type="date")
     */
    private $updatedAt;
    
    /**
     *@MongoDB\Field(name="createdAt", type="date")
     */
    private $createdAt;


    /**
     *@MongoDB\String
     *@MongoDB\Field(name="LocalTitle")
     */
    private $localTitle;
    
    /**
     *@MongoDB\Field(name="FullTitle", type="string")
     */
    private $fullTitle;
    
    /**
     *@MongoDB\Field(name="ShortDescription", type="string")
     */
    private $shortDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="FullDescription")
     */
    private $fullDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="LocalDescription")
     */
    private $localDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Country")
     */
    private $country;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="City")
     */
    private $city;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Adress")
     */
    private $adress;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="MainType")
     */
    private $mainType;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="AdditionalType")
     */
    private $additionalType;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Contacts")
     */
    private $contacts;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="ExternalResources")
     */
    private $externalResources;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Postcode")
     */
    private $postcode;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Capacity")
     */
    private $capacity;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="MaxCapacity")
     */
    private $maxCapacity;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Latitude")
     */
    private $latitude;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Longtitude")
     */
    private $longtitude;
    
    
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
        $this->roles = $role;
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
    
    public function getShortTitle()
    {
        return $this->shortTitle;
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

   
    /**
     * Set roles
     *
     * @param string $shortTitle
     * @return self
     */
    public function setShortTitle($shortTitle)
    {
        $this->shortTitle = $shortTitle;
        return $this;
    }

    /**
     * Set updatedAt
     *
     * @param date $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return date $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set localTitle
     *
     * @param string $localTitle
     * @return self
     */
    public function setLocalTitle($localTitle)
    {
        $this->localTitle = $localTitle;
        return $this;
    }

    /**
     * Get localTitle
     *
     * @return string $localTitle
     */
    public function getLocalTitle()
    {
        return $this->localTitle;
    }

    /**
     * Set fullTitle
     *
     * @param string $fullTitle
     * @return self
     */
    public function setFullTitle($fullTitle)
    {
        $this->fullTitle = $fullTitle;
        return $this;
    }

    /**
     * Get fullTitle
     *
     * @return string $fullTitle
     */
    public function getFullTitle()
    {
        return $this->fullTitle;
    }

    /**
     * Set shortDesc
     *
     * @param string $shortDesc
     * @return self
     */
    public function setShortDesc($shortDesc)
    {
        $this->shortDesc = $shortDesc;
        return $this;
    }

    /**
     * Get shortDesc
     *
     * @return string $shortDesc
     */
    public function getShortDesc()
    {
        return $this->shortDesc;
    }

    /**
     * Set fullDesc
     *
     * @param string $fullDesc
     * @return self
     */
    public function setFullDesc($fullDesc)
    {
        $this->fullDesc = $fullDesc;
        return $this;
    }

    /**
     * Get fullDesc
     *
     * @return string $fullDesc
     */
    public function getFullDesc()
    {
        return $this->fullDesc;
    }

    /**
     * Set localDesc
     *
     * @param string $localDesc
     * @return self
     */
    public function setLocalDesc($localDesc)
    {
        $this->localDesc = $localDesc;
        return $this;
    }

    /**
     * Get localDesc
     *
     * @return string $localDesc
     */
    public function getLocalDesc()
    {
        return $this->localDesc;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get country
     *
     * @return string $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return self
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * Get adress
     *
     * @return string $adress
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set mainType
     *
     * @param string $mainType
     * @return self
     */
    public function setMainType($mainType)
    {
        $this->mainType = $mainType;
        return $this;
    }

    /**
     * Get mainType
     *
     * @return string $mainType
     */
    public function getMainType()
    {
        return $this->mainType;
    }

    /**
     * Set additionalType
     *
     * @param string $additionalType
     * @return self
     */
    public function setAdditionalType($additionalType)
    {
        $this->additionalType = $additionalType;
        return $this;
    }

    /**
     * Get additionalType
     *
     * @return string $additionalType
     */
    public function getAdditionalType()
    {
        return $this->additionalType;
    }

    /**
     * Set contacts
     *
     * @param string $contacts
     * @return self
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * Get contacts
     *
     * @return string $contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * Set externalResources
     *
     * @param string $externalResources
     * @return self
     */
    public function setExternalResources($externalResources)
    {
        $this->externalResources = $externalResources;
        return $this;
    }

    /**
     * Get externalResources
     *
     * @return string $externalResources
     */
    public function getExternalResources()
    {
        return $this->externalResources;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return self
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * Get postcode
     *
     * @return string $postcode
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set capacity
     *
     * @param string $capacity
     * @return self
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        return $this;
    }

    /**
     * Get capacity
     *
     * @return string $capacity
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set maxCapacity
     *
     * @param string $maxCapacity
     * @return self
     */
    public function setMaxCapacity($maxCapacity)
    {
        $this->maxCapacity = $maxCapacity;
        return $this;
    }

    /**
     * Get maxCapacity
     *
     * @return string $maxCapacity
     */
    public function getMaxCapacity()
    {
        return $this->maxCapacity;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return self
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longtitude
     *
     * @param string $longtitude
     * @return self
     */
    public function setLongtitude($longtitude)
    {
        $this->longtitude = $longtitude;
        return $this;
    }

    /**
     * Get longtitude
     *
     * @return string $longtitude
     */
    public function getLongtitude()
    {
        return $this->longtitude;
    }
}
