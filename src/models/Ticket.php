<?php


class Ticket
{
    private $connectionDetails;
    private $type;

    public function __construct($connectionDetails, $type)
    {
        $this->connectionDetails = $connectionDetails;
        $this->type = $type;
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
}