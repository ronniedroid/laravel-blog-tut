<x-layout>
    <section class="px-6 py-8">
      <main class="max-w-lg mx-auto mt-8 bg-gray-100 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Login!</h1>
        <form method="POST" action="/login" class="mt-8">
          @csrf
          <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
            <input class="border rounded-xl border-gray-400 p-2 w-full" name="email" id="email" type="email" value="{{old('email')}}" required />
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
            <input class="border rounded-xl border-gray-400 p-2 w-full" name="password" id="password" type="password" value="" required />
            @error('password')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
          </div>
        </form>
      </main>

    </section>
  </x-layout>
