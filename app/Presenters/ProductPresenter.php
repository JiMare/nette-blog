<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

class ProductPresenter extends Nette\Application\UI\Presenter
   {

    private Nette\Database\Explorer $database;

	public function __construct(Nette\Database\Explorer $database)
	{
		$this->database = $database;
	}

    public function renderDetail(int $productId): void
    {
        $product = $this->database->table('products')->get($productId);
        if (!$product) {
            $this->error('Stránka nebyla nalezena');
        }
        $this->template->product = $product;
    }

    protected function createComponentProductForm(): Form
	{
	$form = new Form;
	$form->addText('title', 'Titulek:')
		->setRequired();
	$form->addTextArea('description', 'Popis:')
		->setRequired();
    $form->addInteger('price', 'Cena:') 
         ->setRequired();
    $form->addText('availability', 'Dostupnost:')
         ->setRequired();     
    $form->addText('photo', 'Fotografie')
          ->setRequired();         

	$form->addSubmit('send', 'Uložit');
	$form->onSuccess[] = [$this, 'productFormSucceeded'];

	return $form;
    }

    public function productFormSucceeded(array $values): void
    {
        $productId = $this->getParameter('productId');

        if($productId){
            $product = $this->database->table('products')->get($productId);
            $product->update($values);
            $this->flashMessage("Produkt byl úspěšně editován.", 'success');
        }
        else{
            $product = $this->database->table('products')->insert($values);
            $this->flashMessage("Produkt byl úspěšně vložen do databáze.", 'success');
        }
        
        $this->redirect('detail', $product->products_id);
    }

    public function actionEdit(int $productId): void
	{
		$product = $this->database->table('products')->get($productId);
		if (!$productId) {
			$this->error('Produkt nebyl nalezen');
		}
		$this['productForm']->setDefaults($product->toArray());
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
	}

    public function actionCreate(): void
	{
	if (!$this->getUser()->isLoggedIn()) {
		$this->redirect('Sign:in');
	}
	}
   
}