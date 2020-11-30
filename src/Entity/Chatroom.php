<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chatroom
 *
 * @ORM\Table(name="chatroom")
 * @ORM\Entity
 */
class Chatroom
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Server", type="string", length=255, nullable=true)
     */
    private $server;

    /**
     * @var string
     *
     * @ORM\Column(name="Chatroom", type="string", length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chatroom;

    public function getServer(): ?string
    {
        return $this->server;
    }

    public function setServer(?string $server): self
    {
        $this->server = $server;

        return $this;
    }

    public function getChatroom(): ?string
    {
        return $this->chatroom;
    }


}
