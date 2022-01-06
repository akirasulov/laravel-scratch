<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <h1 class="text-center text-xl font-bold">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <x-panel>
                <x-form.input name="name" />
                <x-form.input name="username" />
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <x-form.button>Submit</x-form.button>
                </x-panel>
             <x-flash />
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
