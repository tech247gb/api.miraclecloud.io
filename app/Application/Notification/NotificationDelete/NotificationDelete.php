<?php


namespace App\Application\Notification\NotificationDelete;


use App\Application\Core\CommandBase;

class NotificationDelete extends CommandBase
{

    /**
     * @var int
     */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return NotificationDelete
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function validateCommand(): bool
    {
        return true;
    }

}
