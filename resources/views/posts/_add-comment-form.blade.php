@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">
             
            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
            <textarea name="body" 
                      class="w-full text-sm p-4 border border-gray-400 rounded-xl resize-none focus:outline-none focus:ring" 
                      cols="30" 
                      rows="10" 
                      placeholder="Quick, thing of something to say!"
                      required>
                    </textarea>
                    @error('body')
                        <span class="text-red-400 font-semibold text-xs">{{ $message }}</span>
                    @enderror
        </div>

        <div class="flex justify-end mt-6">
           <x-form.button>Post</x-form.button>
        </div>

    </form>
</x-panel>
@else
<p class="font-semibold">
    <a href="/register" class="text-blue-500 hover:underline">Register</a>
    or
    <a href="/login" class="text-blue-500 hover:underline">Log In</a>
    to leave a comment. 
</p>
@endauth