@auth
    <form action="/posts/{{ $post->slug }}/comments" method="POST" class="space-y-3">
        @csrf
        <header class="flex items-center space-x-4">
            <img src="https://i.pravatar.cc/40?u={{ auth()->user()->id }}" alt="users avatar" width="40" height="40"
                class="rounded-full">

            <h3>Leave a comment!</h3>
        </header>

        <div class="mt-4">
            <textarea name="body" id="body" class="w-full text-sm" rows="5" placeholder="Remember to be respectful"
                required></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <footer class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600">
                Post
            </button>
        </footer>
    </form>
@else
    <p>Please <a href="/login" class="text-blue-500">login</a> or <a href="/register" class="text-blue-500">register</a> an
        account to leave a comment</p>
@endauth
