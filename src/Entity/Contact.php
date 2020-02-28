<?php

namespace instantjay\salesmatephp\Entity;

class Contact extends SalesmateEntity
{
    public function __construct($data = [])
    {
        $this->availableProperties = [
            'id',
            'name',
            'owner',
            'email',
            'company',
            'phone',
            'otherPhone',
            'mobile',
            'description',
            'skypeId',
            'website'
        ];

        $this->path = '/contacts';

        parent::__construct($data);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->data['name'] = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->data['owner'];
    }

    /**
     * @param string $ownerId
     */
    public function setOwner($ownerId)
    {
        $this->data['owner'] = $ownerId;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmail($emailAddress)
    {
        $this->data['email'] = $emailAddress;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->data['company'];
    }

    /**
     * @param string $companyId
     */
    public function setCompany($companyId)
    {
        $this->data['company'] = $companyId;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->data['phone'];
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhone($phoneNumber)
    {
        $this->data['phone'] = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getOtherPhone()
    {
        return $this->data['otherPhone'];
    }

    /**
     * @param string $phoneNumber
     */
    public function setOtherPhone($phoneNumber)
    {
        $this->data['otherPhone'] = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->data['mobile'];
    }

    /**
     * @param string $phoneNumber
     */
    public function setMobile($phoneNumber)
    {
        $this->data['mobile'] = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->data['mobile'];
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->data['description'] = $description;
    }

    /**
     * @return string
     */
    public function getSkypeId()
    {
        return $this->data['skypeId'];
    }

    /**
     * @param $skypeId
     */
    public function setSkypeId($skypeId)
    {
        $this->data['skypeId'] = $skypeId;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->data['website'];
    }

    /**
     * @param $website
     */
    public function setWebsite($website)
    {
        $this->data['website'] = $website;
    }
}
