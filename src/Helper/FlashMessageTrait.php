<?php

namespace Alura\Courses\Helper;

/**
 * 
 */
trait FlashMessageTrait
{
    public function defineMessage(string $type, string $message): void
    {
        $_SESSION['mensagem'] = $message;
        $_SESSION['tipoMensagem'] = $type;
    }
}
