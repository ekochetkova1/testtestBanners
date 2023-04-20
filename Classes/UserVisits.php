<?php

declare(strict_types=1);

namespace Classes;

class UserVisits
{
    private $ipAddress;

    private $userAgent;

    private $pageUrl;

    private $userViews;

    private $dbUser;

    public function __construct()
    {
        $this->dbUser = new UserModel();
        $this->ipAddress = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'test';
        $this->pageUrl = $_SERVER['HTTP_REFERER'];

        $this->userViews = $this->getUserViews();
    }

    private function getUserViews()
    {
        return $this->dbUser->getUserViews($this->ipAddress, $this->userAgent, $this->pageUrl);
    }

    public function setUserViews()
    {
        if ($this->userViews > 0) {
            $this->dbUser->UpdateUserViews($this->ipAddress, $this->userAgent, $this->pageUrl, ++$this->userViews);
        } else {
            $this->dbUser->InsertUserViews($this->ipAddress, $this->userAgent, $this->pageUrl, ++$this->userViews);
        }
    }
}
