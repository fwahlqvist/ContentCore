<?php
namespace ContentCore\Entity;

class User
{
    CONST DISPLAY_NAME_FIRSTLAST = "firstLast";
    CONST DISPLAY_NAME_LASTFIRST = "lastFirst";

    public $UserId;

    public $firstName;

    public $lastName;

    public function exchangeArray($data)
    {
        $this->UserId = (isset($data['UserId'])) ? $data['UserId'] : null;
        $this->firstName = (isset($data['FirstName'])) ? $data['FirstName'] : null;
        $this->lastName = (isset($data['LastName'])) ? $data['LastName'] : null;
    }

    public function getFullName($displayOrder = self::DISPLAY_NAME_FIRSTLAST)
    {
        if ($displayOrder === self::DISPLAY_NAME_FIRSTLAST) {
            return sprintf("%s %s", $this->firstName, $this->lastName);
        } else {
            return sprintf("%s %s", $this->lastName, $this->firstName);
        }
    }
}