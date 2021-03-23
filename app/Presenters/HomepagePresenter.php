<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\ArticleManager;
use App\Model\ProductsManager;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
	private ArticleManager $articleManager;
    private ProductsManager $productsManager;

	public function __construct(ArticleManager $articleManager, ProductsManager $productsManager)
	{
		$this->articleManager = $articleManager;
		$this->productsManager = $productsManager;
	}

    public function renderDefault(): void
    {
	$this->template->posts = $this->articleManager
	    ->getPublicArticles()
		->limit(5);

	$this->template->products = $this->productsManager
		->getPublicProducts()
		->limit(5);	
    }
}
