<?php

namespace App\Twig\Components;

use App\Form\MyFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class MyForm extends AbstractController
{

	use ComponentWithFormTrait;
	use DefaultActionTrait;


	#[LiveProp]
	public bool $isSuccessful = false;

	public function hasValidationErrors(): bool {
		return $this->getForm()->isSubmitted() && !$this->getForm()->isValid();
	}

	#[LiveAction]
	public function saveComment(): void {
		$this->submitForm();
		$this->isSuccessful = true;
	}

	protected function instantiateForm(): FormInterface {
		return $this->createForm(MyFormType::class);
	}
}
