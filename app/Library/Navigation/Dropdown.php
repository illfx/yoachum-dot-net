<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/14/18
 * Time: 11:15 AM
 */

namespace App\Library\Navigation;


class Dropdown extends ItemAbstract
{

    protected $menuItems = [];

    public function __construct($text, $items = [])
    {
        $this->menuItems = $items;
        parent::__construct($text);
    }

    public function getMenuItems() : array
    {
        return $this->menuItems;
    }

}