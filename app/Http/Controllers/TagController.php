<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TagController extends Controller
{

    /**
     * return tags form
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("tags.create", [
            "tag" => new Tag(),
        ]);
    }

    /**
     * store tags
     * @param TagRequest $request
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function store(TagRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $validated = $request->validated();

        $tag = Tag::query()
            ->create([
                'name' => $validated['name'],
            ]);

        return redirect(route("posts.index"));
    }
}
