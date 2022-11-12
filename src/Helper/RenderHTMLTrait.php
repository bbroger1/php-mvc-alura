<?php

namespace Alura\Courses\Helper;

/**
 * 
 */
trait RenderHTMLTrait
{
    public function renderHTML(string $pathTemplate, array $data = null): string
    {
        if (isset($data)) {
            extract($data);
        }
        ob_start();
        require __DIR__ . '/../../view' . $pathTemplate;
        $html = ob_get_clean();

        return $html;
    }
}
