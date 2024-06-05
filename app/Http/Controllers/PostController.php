<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
            ->paginate(4);

        return view('posts.index', compact(['posts']));
    }

    /**
     * return posts form
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     * @author MARIANI Matthieu <dev.marianimatthieu@gmail.com>
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("posts.create", [
            "post" => new Post(),
            "categories" => Category::select('id', 'name')->get(),
            "tags" => Tag::select('id', 'name')->get()
        ]);
    }

    /**
     * store posts
     * @param PostRequest $request
     * @return \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
     * @author MARIANI Matthieu <<dev.marianimatthieu@gmail.com>>
     */
    public function store(PostRequest $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $validated = $request->validated();
        $post = Post::query()
            ->create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'category_id' => $validated['category_id'],
                'author' => auth()->user()->name
            ]);
        $post->tags()->sync($validated['tags']);

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
        return view("posts.edit", [
            "post" => $post,
            "categories" => Category::select('id', 'name')->get(),
            "tags" => Tag::select('id', 'name')->get()
        ]);
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

        $post->tags()->sync($validated['tags']);

        $post->update($validated);

        return redirect()->route('posts.show', $post->id);
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
