<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    /**
     * return all posts paginated
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $posts = Post::query()
            ->select('*')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('posts.index', compact(['posts']));
    }

    /**
     * return posts form
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("posts.create");
    }

    /**
     * store posts
     * @param PostRequest $request
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function store(PostRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $validated = $request->validated();

        Post::query()
            ->create([
                'title' => $validated['title'],
                'content' => $validated['content'],
            ]);

        return redirect(route("posts.index"));
    }

    /**
     * show post
     * @param Post $post
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function show(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("posts.show", compact("post"));
    }

    /**
     * edit post
     * @param Post $post
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function edit(Post $post): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * update post
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function update(PostRequest $request, Post $post): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect(route("posts.index"));
    }

    /**
     * delete post
     * @param Post $post
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function destroy(Post $post): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
