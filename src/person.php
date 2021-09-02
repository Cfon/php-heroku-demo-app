<?php

namespace App\HerokuDemoApp;

class Person
{	
	public function __construct(
		public string $name, 
		public int $age
	) {}
}