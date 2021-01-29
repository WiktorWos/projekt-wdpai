<?php


class Ticket
{
    private $connectionDetails;
    private $type;
    private $userId;

    public function __construct($connectionDetails, $type, $userId)
    {
        $this->connectionDetails = $connectionDetails;
        $this->type = $type;
        $this->userId = $userId;
    }

    public function getConnectionDetails()
    {
        return $this->connectionDetails;
    }

    public function setConnectionDetails($connectionDetails): void
    {
        $this->connectionDetails = $connectionDetails;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }
}