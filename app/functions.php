<?php
function display_page($site, $section, $sub_section, $page, $template)
{
	// Page not found
	if (!file_exists(CONTENT_PATH . '/' . $section . $sub_section . $page . '.txt')) {
		$page = '404';
		$template = 'home';
	}

	// Generate HTML from Markdown + SmartyPants and feed it to Haml:
	$content = SmartyPants(Markdown(file_get_contents(CONTENT_PATH . '/' . $section . $sub_section . $page . '.txt')));

	// display_haml(TEMPLATE_PATH . '/' . $template . '.haml', array($site, $content), HAML_TEMP_PATH);
	include(TEMPLATE_PATH . '/' . $template . '.php');
}
?>
