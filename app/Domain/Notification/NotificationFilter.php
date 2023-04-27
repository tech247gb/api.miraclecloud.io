<?php


namespace App\Domain\Notification;


class NotificationFilter
{

    /**
     * @var int|null
     */
    private $NtfID;

    /**
     * @var int|null
     */
    private $UserID;

    /**
     * @var string|null
     */
    private $NotificationTitle;

    /**
     * @var int|null
     */
    private $NotificationType;

    /**
     * @var int|null
     */
    private $AddedBy;

    /**
     * @var int|null
     */
    private $redirecturl;

    /**
     * @var int|null
     */
    private $Seen;

    /**
     * @var int|null
     */
   
    public function getNtfID(): ?int
    {
        return $this->NtfID;
    }

    /**
     * @param int|null $NtfID
     * @return NotificationFilter
     */
    public function setNtfID(?int $NtfID): self
    {
        $this->NtfID = $NtfID;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserID(): ?int
    {
        
        return $this->UserID;
    }

    /**
     * @param int|null $UserID
     * @return NotificationFilter
     */
    public function setUserID(?int $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotificationTitle(): ?string
    {
        return $this->NotificationTitle;
    }

    /**
     * @param string|null $NotificationTitle
     * @return NotificationFilter
     */
    public function setNotificationTitle(?string $NotificationTitle): self
    {
        $this->NotificationTitle = $NotificationTitle;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNotificationType(): ?int
    {
        return $this->NotificationType;
    }

    /**
     * @param int|null $NotificationType
     * @return NotificationFilter
     */
    public function setNotificationType(?int $NotificationType): self
    {
        $this->NotificationType = $NotificationType;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAddedBy(): ?int
    {
        return $this->AddedBy;
    }

    /**
     * @param int|null $AddedBy
     * @return NotificationFilter
     */
    public function setAddedBy(?int $AddedBy): self
    {
        $this->AddedBy = $AddedBy;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getredirecturl(): ?int
    {
        return $this->redirecturl;
    }

    /**
     * @param int|null $redirecturl
     * @return NotificationFilter
     */
    public function setredirecturl(?int $redirecturl): self
    {
        $this->redirecturl = $redirecturl;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSeen(): ?int
    {
        return $this->Seen;
    }

    /**
     * @param int|null $Seen
     * @return NotificationFilter
     */
    public function setSeen(?int $Seen): self
    {
        $this->Seen = $Seen;

        return $this;
    }

    /**
     * @return int|null
     */
  
}
