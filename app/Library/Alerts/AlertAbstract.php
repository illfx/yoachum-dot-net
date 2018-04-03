<?php

namespace App\Library\Alerts;

use App\Library\Link;


/**
 * Class AlertAbstract
 * @package App\Library
 */
abstract class AlertAbstract
{
    /**
     * @var string The alert bold string
     */
    public $strong = "";
    /**
     * @var string The alert message string
     */
    public $message = "";
    /**
     * @var Link|null The alert link object
     */
    protected $link = null;

    /**
     * @var bool
     */
    protected $dismissible = false;

    /**
     * @var
     */
    protected $type = "";

    /**
     * Alert constructor.
     * @param $message
     * @param string $strong
     * @param Link|null $link
     */
    public function __construct($message, $strong = '', Link $link = null)
    {
        $this->strong = $strong;
        $this->message = $message;
        $this->link = $link;
    }
    /**
     * @return string
     */
    public function getStrong(): string
    {
        return $this->strong;
    }

    /**
     * @param string $strong
     */
    public function setStrong(string $strong): void
    {
        $this->strong = $strong;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return Link|null
     */
    public function getLink(): ?Link
    {
        return $this->link;
    }

    /**
     * @param Link|null $link
     */
    public function setLink(?Link $link): void
    {
        $this->link = $link;
    }

    /**
     * @return bool
     */
    public function isDismissible(): bool
    {
        return $this->dismissible;
    }

    /**
     * @param bool $dismissible
     */
    public function setDismissible(bool $dismissible): void
    {
        $this->dismissible = $dismissible;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

}