<?php


namespace App\Domain\Notification;


class Notification
{

    /**
     * @var int|null
     */
    private $NtfID;

    /**
     * @var string|null
     */
    private $NotificationTitle;

    /**
     * @var int|null
     */
    private $NotificationType;

    /**
     * @var string|null
     */
    private $NotificationTypeName;

    /**
     * @var int|null
     */
    private $AddedBy;

    /**
     * @var string|null
     */
    private $NotificationDesc;

    /**
     * @var int|null
     */
    private $Seen;

    /**
     * @var string|null
     */
    private $redirecturl;

    /**
     * @var int|null
     */
 
    public static $exportExcelHeaders = [
        'Notification Name',
        'Notification Type',
    ];

    /**
     * @return int|null
     */
    public function getNtfID(): ?int
    {
        return $this->NtfID;
    }

    /**
     * @param int|null $NtfID
     * @return Notification
     */
    public function setNtfID(?int $NtfID): self
    {
        $this->NtfID = $NtfID;

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
     * @return Notification
     */
    public function setNotificationTitle(?string $NotificationTitle): self
    {
        $this->NotificationTitle = $NotificationTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function setNotificationDesc(?string $NotificationDesc): self
    {
        $this->NotificationDesc = $NotificationDesc;

        return $this;
    }
    public function getNotificationDesc(): ?string
    {
        return $this->NotificationDesc;
    }

    /**
     * @param string|null $NotificationDesc
     * @return Notification
     */
    

    /**
     * @return string|null
     */
   

   

    /**
     * @return int|null
     */
    public function getNotificationType(): ?int
    {
        return $this->NotificationType;
    }

    /**
     * @param int|null $NotificationType
     * @return Notification
     */
    public function setNotificationType(?int $NotificationType): self
    {
        $this->NotificationType = $NotificationType;

        return $this;
    }
    public function getUserID(): ?string
    {
        return $this->UserID;
    }

    /**
     * @param string|null $NotificationTypeName
     * @return Notification
     */
    public function setUserID(?int $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotificationTypeName(): ?string
    {
        return $this->NotificationTypeName;
    }

    /**
     * @param string|null $NotificationTypeName
     * @return Notification
     */
    public function setNotificationTypeName(?string $NotificationTypeName): self
    {
        $this->NotificationTypeName = $NotificationTypeName;

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
     * @return Notification
     */
    public function setAddedBy(?int $AddedBy): self
    {
        $this->AddedBy = $AddedBy;

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
     * @return Notification
     */
    public function setSeen(?int $Seen): self
    {
        $this->Seen = $Seen;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getredirecturl(): ?string
    {
        return $this->redirecturl;
    }

    /**
     * @param string|null $redirecturl
     * @return Notification
     */
    public function setredirecturl(?string $redirecturl): self
    {
        $this->redirecturl = $redirecturl;

        return $this;
    }

    /**
     * @return int|null
     */
   

}
