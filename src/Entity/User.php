<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Server", type="string", length=255, nullable=true)
     */
    private $server;

    /**
     * @var int
     *
     * @ORM\Column(name="User_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Status", type="string", length=255, nullable=true)
     */
    private $status;

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }


}
