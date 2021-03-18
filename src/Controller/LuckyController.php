<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LuckyController extends AbstractController
{
	public function number(int $max): Response
	{
		$number = random_int(0, $max);
		return $this->render('lucky/number.html.twig', [
			'max'    => $max,
			'number' => $number
		]);
	}
}
