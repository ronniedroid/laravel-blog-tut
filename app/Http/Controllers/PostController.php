<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    //
    public function index()
    {
        return view("posts.index", [
            "posts" => Post::latest()
                ->filter(request(["search", "category", "author"]))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view("posts.show", [
            "post" => $post,
        ]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store() {
        $attributes = request()->validate([
            'title' => ['required'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:3'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = null;
        $attributes['slug'] = $attributes['title'];

        Post::create($attributes);

        return redirect('/')->with('success', 'Your post was published');
    }
}
