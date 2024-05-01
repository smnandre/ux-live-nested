<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MyFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
		$builder
			->add("text", null, [
				"label"       => "Váš názor",
				"attr"        => [
					"placeholder" => "Pridajte Váš názor...",
				],
				"constraints" => [
					new NotBlank([
						"message" => "Názor nemôže byť prázdny",
					]),
					new Length([
						"min"        => 5,
						"minMessage" => "Názor musí mať minimálne {{ limit }} znakov",
						"max"        => 1000,
						"maxMessage" => "Názor môže mať maximálne {{ limit }} znakov",
					]),
				],
			])
			->add("submit", SubmitType::class, [
				"label" => "Odoslať",
			]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
