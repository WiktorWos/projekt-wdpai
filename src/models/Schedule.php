<?php


class Schedule
{
    private $dayOfWeek;
    private $departureTime;

    public function __construct($dayOfWeek, $departureTime)
    {
        $this->dayOfWeek = $dayOfWeek;
        $this->departureTime = $departureTime;
    }

    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek($dayOfWeek): void
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    public function setDepartureTime($departureTime): void
    {
        $this->departureTime = $departureTime;
    }
}