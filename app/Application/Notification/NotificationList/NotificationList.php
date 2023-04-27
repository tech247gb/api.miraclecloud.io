<?php


namespace App\Application\Notification\NotificationList;


use App\Application\Core\CommandBase;
use App\Exceptions\UnprocessableCommandException;
use App\Contract\Exception\ValidationExceptionCodeInterface;


class NotificationList extends CommandBase
{

   /** @var int */
   protected $UserID;

   public function getUserID(): int
   {
       return $this->UserID;
   }

   public function setUserID(int $UserID): self
   {
       $this->UserID = $UserID;

       return $this;
   }

   public function validateCommand(): bool
   {
       if (! $this->UserID) {
           throw new UnprocessableCommandException(ValidationExceptionCodeInterface::AZURE_ACCOUNT_APP_LIST_BY_CLIENT_ID_EXCEPTION, 'Entity not found');
       }

       return true;
   }

}
