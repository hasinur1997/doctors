<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use App\Specialty;

class SpecialtyComposer
{
	public function compose(View $view)
	{
		$view->with('specialties', Specialty::all());
	}
}