<?php


class ConnectionDetails
{
    private $id;
    private $from;
    private $to;
    private $time;
    private $price;
    private $schedule;

    public function __construct($id, $from, $to, $time, $price, $schedule)
    {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
        $this->time = $time;
        $this->price = $price;
        $this->schedule = $schedule;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from): void
    {
        $this->from = $from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to): void
    {
        $this->to = $to;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time): void
    {
        $this->time = $time;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getSchedule()
    {
        return $this->schedule;
    }

    public function setSchedule($schedule): void
    {
        $this->schedule = $schedule;
    }


}