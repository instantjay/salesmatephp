<?php

namespace instantjay\salesmatephp\Entity;

use instantjay\salesmatephp\Exception\InvalidFormatException;
use instantjay\salesmatephp\SalesmateConnection;
use instantjay\salesmatephp\SalesmateResponse;

class Deal extends SalesmateEntity
{
    public function __construct($data = [])
    {
        $this->path = '/deals';

        parent::__construct($data);

        $this->availableProperties = [
            'id',
            'title',
            'primaryContact',
            'primaryCompany',
            'owner',
            'estimatedCloseDate',
            'dealValue',
            'currency',
            'pipeline',
            'stage',
            'source',
            'priority',
            'status',
            'description',
            'tags',
            'followers'
        ];
    }

    /**
     * @param SalesmateConnection $salesmateConnection
     * @param string $httpMethod
     * @return SalesmateResponse
     */
    public function commit($salesmateConnection, $httpMethod = null) : SalesmateResponse
    {
        return parent::commit($salesmateConnection, $httpMethod);
    }

    /**
     * @param $title string
     */
    public function setTitle($title)
    {
        $this->data['title'] = $title;
    }

    /**
     * @param $ownerId int
     */
    public function setOwner($ownerId)
    {
        $this->data['owner'] = $ownerId;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->data['description'];
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->data['description'] = $description;
    }

    /**
     * @param $primaryContactId int
     */
    public function setPrimaryContact($primaryContactId)
    {
        $this->data['primaryContact'] = $primaryContactId;
    }

    /**
     * @param string $userId
     */
    public function addFollowerUser($userId)
    {
        $this->data['followers'][]['userId'] = $userId;
    }

    /**
     * @param string $contactId
     */
    public function addFollowerContact($contactId)
    {
        $this->data['followers'][]['contactId'] = $contactId;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->data['title'];
    }

    /**
     * @return string
     */
    public function getPrimaryContact()
    {
        return $this->data['primaryContact'];
    }

    /**
     * @return string
     */
    public function getPrimaryCompany()
    {
        return $this->data['primaryCompany'];
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->data['owner'];
    }

    /**
     * @return string
     */
    public function getEstimatedCloseDate()
    {
        return $this->data['estimatedCloseDate'];
    }

    /**
     * @param string $closeDate
     */
    public function setEstimatedCloseDate($closeDate)
    {
        $this->data['estimatedCloseDage'] = $closeDate;
    }

    /**
     * @return string
     */
    public function getDealValue()
    {
        return $this->data['dealValue'];
    }

    /**
     * @param string $value
     */
    public function setDealValue($value)
    {
        $this->data['dealValue'] = $value;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->data['currency'];
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrency($currencyCode)
    {
        $this->data['currency'] = $currencyCode;
    }

    /**
     * @return string
     */
    public function getPipeline()
    {
        return $this->data['pipeline'];
    }

    /**
     * @param string $pipeline
     */
    public function setPipeline($pipeline)
    {
        $this->data['pipeline'] = $pipeline;
    }

    /**
     * @return string
     */
    public function getStage()
    {
        return $this->data['stage'];
    }

    /**
     * @param $stage
     */
    public function setStage($stage)
    {
        $this->data['stage'] = $stage;
    }

    public function getSource()
    {
        return $this->data['source'];
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->data['priority'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @param $status string Open, Won or Lost
     * @throws InvalidFormatException
     */
    public function setStatus($status)
    {
        if (!in_array($status, ['Open', 'Won', "Lost"])) {
            throw new InvalidFormatException('Deal status must be Open, Won or Lost according to Salesmate API spec.');
        }

        $this->data['status'] = $status;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->data['tags'];
    }

    /**
     * @return string
     */
    public function getFollowers()
    {
        return $this->data['followers'];
    }
}
