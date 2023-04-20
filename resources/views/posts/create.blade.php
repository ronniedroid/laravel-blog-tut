<x-layout>
    <section class="p-8 w-2/5 m-auto">
        <h1 class="text-center text-xl font-bold uppercase mt-8">Create a post</h1>
        <x-panel class="p-8 my-8 bg-gray-50">
            <form action="/admin/posts/store" method="POST" class="space-y-4" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">Title</label>
                    <input class="border rounded-xl border-gray-400 p-2 w-full" name="title" id="title"
                        type="text" value="{{ old('title') }}" required />

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="px-2 py-2 rounded-xl bg-transparent w-fit"
                        value="{{ old('category_id') }}>
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        @foreach ($categories as $category)
<option value="{{ $category->id }}">{{ ucwords($category->name) }}
                        </option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="Thumbnail">Thembnail</label>
                    <input name="thumbnail" id="thumbnail" class="px-2 py-2 rounded-xl bg-transparent w-fit"
                        type="file" value="{{ old('thumbnail') }}"></input>

                    @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="Excerpt">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" class="w-full text-sm rounded-xl p-2" rows="5"
                        placeholder="Type your posts excerpt here" required>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">Body</label>
                    <textarea name="body" id="body" class="w-full text-sm rounded-xl p-2" rows="10"
                        placeholder="Type your posts excerpt here" required>{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600 focus:bg-blue-600">
                    Submit
                </button>
            </form>
        </x-panel>
    </section>
</x-layout>
