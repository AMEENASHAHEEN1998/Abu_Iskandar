<?php
namespace App\Http\View\Composers;
use App\Models\Category;


use Illuminate\View\View;

class GlobalVariable
{
    public function compose(View $view)
    {
        $Categories = Category::get();
        $view->with(['Categories' => $Categories]);
    }
}
