<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 border-xl p-8">
            <h1 class="text-center text-xl font-bold uppercase">
                <a href="/login">Log In</a>
            </h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="email">
                    Email
                </label>
                    <input class="border border-grey-400 p-2 w-full" 
                           type="text"
                           name="email"
                           id="email"
                           value="{{ old('email') }}"
                           required>
                           @error('email')
                           <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="password">
                    Password
                </label>
                    <input class="border border-grey-400 p-2 w-full" 
                           type="password"
                           name="password"
                           id="password"
                           required>
                    <input class="mt-4" type="checkbox" onclick="togglePassword()" >
                    <label class="pl-2" for="password">Show password</label>
                </div>

                <div class="mb-6">
                    <button type="submit" 
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-600 ">
                        Log in
                    </button>
                </div>
             {{-- <x-flash /> --}}
        </form>
        </main>
    </section>
</x-layout>

<script>
    function togglePassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}
</script>
