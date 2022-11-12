<?php

namespace Alura\Courses\Controller;

use Alura\Courses\Entity\User;
use Alura\Courses\Helper\FlashMessageTrait;
use Alura\Courses\Helper\RenderHTMLTrait;
use Alura\Courses\Infra\EntityManagerCreator;

class UserController implements InterfaceUserController
{
    use FlashMessageTrait, RenderHTMLTrait;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(User::class);
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function formLogin(): void
    {
        echo $this->renderHTML('/users/login.php');
        //require_once __DIR__ . '/../../view/users/login.php';
    }

    public function login()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        if (is_null($email) || $email === false) {
            $this->defineMessage("danger", "Email ou senha inválidos");
            header('Location: /');
            return;
        }
        /** @var User $user */
        $user = $this->userRepository->findOneBy(['email' => $email]);

        if (is_null($user) || !$user->isCorretPassword($password)) {
            $this->defineMessage("danger", "Email ou senha inválidos");
            header('Location: /');
            return;
        }

        $_SESSION['logged'] = true;
        $_SESSION['user'] = $email;

        header('Location: /courses');
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: /');
    }
}
