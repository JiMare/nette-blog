<?php

use Latte\Runtime as LR;

/** source: C:\xampp\htdocs\brilo-blog\app\Presenters/templates/@layout.latte */
final class Template194945e716 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 6 */;
		echo '/css/style.css">
	<title>';
		if ($this->hasBlock("title")) /* line 7 */ {
			$this->renderBlock($ʟ_nm = 'title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'Nette Web</title>
</head>

<body>
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 11 */ {
			echo '	<div';
			echo ($ʟ_tmp = array_filter(['flash', $flash->type])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 11 */;
			echo '>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 11 */;
			echo '</div>
';
			$iterations++;
		}
		echo '
	<ul class="navig">
	<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:")) /* line 14 */;
		echo '">Hlavní strana</a></li>
';
		if ($user->isLoggedIn()) /* line 15 */ {
			echo '		<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) /* line 16 */;
			echo '">Odhlásit</a></li>
';
		}
		else /* line 17 */ {
			echo '		<li><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) /* line 18 */;
			echo '">Přihlásit</a></li>
';
		}
		echo '	</ul>

';
		$this->renderBlock($ʟ_nm = 'content', [], 'html') /* line 22 */;
		echo "\n";
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('scripts', get_defined_vars()) /* line 24 */;
		echo '
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '11'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block scripts} on line 24 */
	public function blockScripts(array $ʟ_args): void
	{
		echo '	<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
';
	}

}
