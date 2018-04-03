<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/14/18
 * Time: 11:09 AM
 */

namespace App\Library\Navigation;


class ItemAbstract
{

    protected $text;

    protected $active = false;

    /**
     * @return mixed
     */
    public function isActive() : bool
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
    }


    public function __construct($text)
    {
        $this->text = $text;
    }


    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return mixed
     */
    public function setText($string)
    {
        return $this->text;
    }
}