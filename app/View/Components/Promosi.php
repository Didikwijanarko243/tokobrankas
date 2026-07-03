<?php

namespace App\View\Components;

use App\Models\Promotion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Promosi extends Component
{
    public $promotions;

    public function __construct()
    {
        $this->promotions = Promotion::with('product')->active()->latest()->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.promosi');
    }
}