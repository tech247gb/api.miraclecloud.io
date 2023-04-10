<?php


namespace App\Application\PowerBI\GetReportListByUser;


use App\Application\Core\CommandBase;
use App\Domain\User\User;
use App\Exceptions\UnprocessableCommandException;

class GetReportListByUser extends CommandBase
{
    /**
     * @var User
     */
    private $user;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return bool
     * @throws UnprocessableCommandException
     */
    public function validateCommand(): bool
    {
        if (!$this->user) {
            throw new UnprocessableCommandException(4022);
        }

        return true;
    }

}
