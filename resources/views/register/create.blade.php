<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 border-xl p-8">
            <h1 class="text-center text-xl font-bold">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="name">
                    Name
                </label>
                    <input class="border border-grey-400 p-2 w-full" 
                           type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') }}"
                           required>
                           @error('name')
                           <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>
                

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                    for="username">
                    Username
                </label>
                    <input class="border border-grey-400 p-2 w-full" 
                           type="text"
                           name="username"
                           id="username"
                           value="{{ old('username') }}"
                           required>
                           @error('username')
                           <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                           @enderror
                </div>

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
                           name="passowrd"
                           id="password"
                           required>
                    <input class="mt-4" type="checkbox" onclick="togglePassword()" >
                    <label class="pl-2" for="password">Show password</label>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" 
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-600 ">
                        Submit
                    </button>
                </div>
              @if ($errors->any())
              <ul>
                @foreach ($errors->all() as $error)
                <li class="text-red-500 text-xs">{{ $error }}</li>
                @endforeach
               </ul>
              @endif
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
