<?php


namespace App\Application\Notification\NotificationCreate;


use App\Application\Core\CommandBase;

class NotificationCreate extends CommandBase
{

    /**
     * @var int
     */
    private $UserID;

    /**
     * @var string
     */
    private $NotificationTitle;

    /**
     * @var int
     */
    private $NotificationType;

    /**
     * @var int
     */
    private $AddedBy;

    /**
     * @var int|null
     */
    private $redirecturl;

    /**
     * @var string|null
     */
    private $Seen;

    /**
     * @var string|null
     */
    
  
    public function getUserID(): int
    {
        return $this->UserID;
    }

    /**
     * @param int $UserID
     * @return NotificationCreate
     */
    public function setUserID(int $UserID): self
    {
        $this->UserID = $UserID;

        return $this;
    }

    /**
     * @return string
     */
    public function getNotificationTitle(): string
    {
        return $this->NotificationTitle;
    }

    /**
     * @param string $NotificationTitle
     * @return NotificationCreate
     */
    public function setNotificationTitle(string $NotificationTitle): self
    {
        $this->NotificationTitle = $NotificationTitle;

        return $this;
    }

    /**
     * @return int
     */
    public function getNotificationType(): int
    {
        return $this->NotificationType;
    }

    /**
     * @param int $NotificationType
     * @return NotificationCreate
     */
    public function setNotificationType(int $NotificationType): self
    {
        $this->NotificationType = $NotificationType;

        return $this;
    }

    /**
     * @return int
     */
    public function getAddedBy(): int
    {
        return $this->AddedBy;
    }

    /**
     * @param int $AddedBy
     * @return NotificationCreate
     */
    public function setAddedBy(int $AddedBy): self
    {
        $this->AddedBy = $AddedBy;

        return $this;
    }

    /**
     * @return int|null
     */
  

    /**
     * @param int|null $entityTypeId
     * @return NotificationCreate
 

     * @return int|null
     */


    /**
     * @return int|null
     */
    
    /**
     * @return string|null
     */
    public function getCondition(): ?string
    {
        return $this->condition;
    }

    /**
     * @param string|null $condition
     * @return NotificationCreate
     */
    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

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
     * @return NotificationCreate
     */
    public function setredirecturl(?int $redirecturl): self
    {
        $this->redirecturl = $redirecturl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSeen(): ?string
    {
        return $this->Seen;
    }

    /**
     * @param string|null $Seen
     * @return NotificationCreate
     */
    public function setSeen(?string $Seen): self
    {
        $this->Seen = $Seen;

        return $this;
    }

  

    /**
     * @return int|null
     */
 

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
