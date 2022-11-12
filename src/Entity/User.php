<?php

namespace Alura\Courses\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    //'teste@teste.com'
    /**
     * @ORM\Column(type="string")
     */
    private $password;
    //123456

    public function isCorretPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
