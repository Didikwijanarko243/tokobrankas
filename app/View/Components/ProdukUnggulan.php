<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\ProdukService;

class ProdukUnggulan extends Component
{
    public $products;
  
    /**
     * Create a new component instance.
     */
    public function __construct(ProdukService $productService, int $limit = 8)
    {
       
        
        $this->products = $productService->getFeatured($limit);
        // dd($this->products);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.produk-unggulan');
    }
}
