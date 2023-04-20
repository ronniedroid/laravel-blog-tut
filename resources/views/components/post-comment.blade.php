@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="users avatar" width="60" height="60"
                class="rounded-full">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">
                    {{ ucwords($comment->author->name) }}
                </h3>
                <p class="text-xs">
                    Posted on
                    <time>{{$comment->created_at->format("M j, Y, H:i")}}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
