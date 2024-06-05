<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoryController extends Controller
{

    /**
     * return categories form
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("categories.create", [
            "category" => new Category(),
        ]);
    }

    /**
     * store categories
     * @param CategoryRequest $request
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function store(CategoryRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $validated = $request->validated();

        $category = Category::query()
            ->create([
                'name' => $validated['name'],
            ]);

        return redirect(route("posts.index"));
    }
}
