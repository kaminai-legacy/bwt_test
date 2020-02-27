<?php
namespace Application\Core;

class View
{
    // $data переменная с параметрами для отображения на странице
    // $template базовая страница в которую подключается страница с контентом $content_view
    public function generate($content_view, $template, $data = null)
    {
        include 'application/views/'.$template;
    }
}
