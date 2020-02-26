<?
namespace Application\Core;

class View
{
	// $data переменная с параметрами для отображения на странице
	// $template_view базовая страница в которую подключается страница с контентом $content_view
	function generate($content_view, $template_view, $data = null)
	{
		include 'application/views/'.$template_view;
	}
}