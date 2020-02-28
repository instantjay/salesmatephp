<?php

namespace instantjay\salesmatephp\Entity;

class User extends SalesmateEntity
{
    public function __construct($data)
    {
        $this->path = '/users';

        $this->availableProperties = [
            'id',
            'firstName',
            'lastName',
            'email',
            'allowedLoginFrom',
            'timezone',
            'photo',
            'dateFormat',
            'timeFormat',
            'emailSignature',
            'isActive',
            'invitationAccepted',
            'nickname',
            'Role',
            'Profile',
            'UserAccessTokens'
        ];

        parent::__construct($data);
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
    public function getFirstName()
    {
        return $this->data['firstName'];
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->data['lastName'];
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
    public function getAllowedLoginFrom()
    {
        return $this->data['allowedLoginFrom'];
    }

    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->data['timezone'];
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->data['photo'];
    }

    /**
     * @return string
     */
    public function getDateFormat()
    {
        return $this->data['dateFormat'];
    }

    /**
     * @return string
     */
    public function getTimeFormat()
    {
        return $this->data['timeFormat'];
    }

    /**
     * @return string
     */
    public function getEmailSignature()
    {
        return $this->data['emailSignature'];
    }

    /**
     * @return string
     */
    public function isActive()
    {
        return $this->data['isActive'];
    }

    /**
     * @return string
     */
    public function getInvitationAccepted()
    {
        return $this->data['invitationAccepted'];
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->data['nickname'];
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->data['Role'];
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->data['Profile'];
    }

    /**
     * @return string
     */
    public function getUserAccessTokens()
    {
        return $this->data['UserAccessTokens'];
    }
}
