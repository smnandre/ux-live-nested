<?php
/**
 * Created by PhpStorm.
 * User: Jozef Môstka
 * Date: 1. 5. 2024
 * Time: 7:48
 */
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController {

	#[Route('/')]
	public function index() {
		return $this->render('index.html.twig');
	}
}