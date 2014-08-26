<?php
/**
 * A very simple representation of football match.
 */
class Match
{

    /**
     * @var string
     */
    protected $home;

    /**
     * @var string
     */
    protected $guest;

    /**
     * @var int
     */
    protected $toto;

    /**
     * @var int
     */
    protected $season;

    /**
     * @var int
     */
    protected $scoreHome;

    /**
     * @var int
     */
    protected $scoreGuest;

    /**
     * @var int
     */
    protected $day;

    /**
     * @param $day
     * @param $guest
     * @param $home
     * @param $scoreGuest
     * @param $scoreHome
     * @param $season
     * @param $toto
     */
    function __construct($day, $guest, $home, $scoreGuest, $scoreHome, $season, $toto)
    {
        $this->day = $day;
        $this->guest = $guest;
        $this->home = $home;
        $this->scoreGuest = $scoreGuest;
        $this->scoreHome = $scoreHome;
        $this->season = $season;
        $this->toto = $toto;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $guest
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
    }

    /**
     * @return mixed
     */
    public function getGuest()
    {
        return $this->guest;
    }

    /**
     * @param mixed $home
     */
    public function setHome($home)
    {
        $this->home = $home;
    }

    /**
     * @return mixed
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * @param mixed $scoreGuest
     */
    public function setScoreGuest($scoreGuest)
    {
        $this->scoreGuest = $scoreGuest;
    }

    /**
     * @return mixed
     */
    public function getScoreGuest()
    {
        return $this->scoreGuest;
    }

    /**
     * @param mixed $scoreHome
     */
    public function setScoreHome($scoreHome)
    {
        $this->scoreHome = $scoreHome;
    }

    /**
     * @return mixed
     */
    public function getScoreHome()
    {
        return $this->scoreHome;
    }

    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * @param mixed $toto
     */
    public function setToto($toto)
    {
        $this->toto = $toto;
    }

    /**
     * @return mixed
     */
    public function getToto()
    {
        return $this->toto;
    }
}
