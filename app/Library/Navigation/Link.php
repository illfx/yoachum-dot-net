<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 3/10/18
 * Time: 4:43 PM
 */

namespace App\Library\Navigation;


/**
 * Class Link
 * @package App\Library
 */
class Link extends ItemAbstract
{

    /**
     * @var string
     */
    protected $href = '';

    /**
     * @var bool
     */
    protected $active = false;



    /**
     * Link constructor.
     * @param $text string The link caption
     * @param $href string The link URL
     */
    public function __construct($text, $href)
    {
        $this->text = $text;
        $this->href = $href;
        parent::__construct($text);
    }

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref(string $href): void
    {
        $this->href = $href;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

}