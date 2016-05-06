<?php
namespace VenueBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="Venue")
 */
class Venue  {
    
    /**
     * @MongoDB\Id
     */
    protected $ido;
    
    /**
     * @MongoDB\Field(name="objectId",type="string")
     */
    protected $id;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="VenueUser")
     */
    protected $venueUser;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="VenuePassword")
     */
    protected $venuePassword;
    
    
    /**
     *@MongoDB\Field(name="Roles")
     */
    private $role;
    
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="ShortTitle")
     */
    protected $shortTitle;
    
    /**
     *@MongoDB\Field(name="updatedAt", type="date")
     */
    protected $updatedAt;
    
    /**
     *@MongoDB\Field(name="createdAt", type="date")
     */
    protected $createdAt;


    /**
     *@MongoDB\String
     *@MongoDB\Field(name="LocalTitle")
     */
    protected $localTitle;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="FullTitle")
     */
    protected $fullTitle;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="ShortDescription")
     */
    protected $shortDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="FullDescription")
     */
    protected $fullDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="LocalDescription")
     */
    protected $localDesc;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Country")
     */
    protected $country;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="City")
     */
    protected $city;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Adress")
     */
    protected $adress;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="MainType")
     */
    protected $mainType;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="AdditionalType")
     */
    protected $additionalType;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Contacts")
     */
    protected $contacts;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="ExternalResources")
     */
    protected $externalResources;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Postcode")
     */
    protected $postcode;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Capacity")
     */
    protected $capacity;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="MaxCapacity")
     */
    protected $maxCapacity;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Latitude")
     */
    protected $latitude;
    
    /**
     *@MongoDB\String
     *@MongoDB\Field(name="Longtitude")
     */
    protected $longtitude;
    

    /**
     * Set venueUser
     * @
     * @param string $venueUser
     * @return self
     */
    public function setVenueUser($venueUser)
    {
        $this->venueUser = $venueUser;
        return $this;
    }

    /**
     * Get venueuser
     *
     * @return string $venueUser
     */
    public function getVenueUser()
    {
        return $this->venueUser;
    }

    /**
     * Set venuepassword
     *
     * @param string $venuePassword
     * @return self
     */
    public function setVenuePassword($venuePassword)
    {
        $this->venuePassword = $venuePassword;
        return $this;
    }

    /**
     * Get venuepassword
     *
     * @return string $venuePassword
     */
    public function getVenuePassword()
    {
        return $this->venuePassword;
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
     * Set shortTitle
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
     * Get shortTitle
     *
     * @return string $shortTitle
     */
    public function getShortTitle()
    {
        return $this->shortTitle;
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

    /**
     * Set updatedAt
     *
     * @param string $updatedAt
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
     * @return string $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set createdAt
     *
     * @param string $createdAt
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
     * @return string $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get ido
     *
     * @return id $ido
     */
    public function getIdo()
    {
        return $this->ido;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * Get role
     *
     * @return string $role
     */
    public function getRole()
    {
        return $this->role;
    }
}
