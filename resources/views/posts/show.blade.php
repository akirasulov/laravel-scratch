<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/public/images/illustration-1.png" alt="">
                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/public/images/lary-avatar.svg" alt="">
                        <div class="ml-3    ">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-center mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                           Back to Posts
                        </a>

                        <div class="space-x-2">
                            {{-- <x-category-button :category="$post->category" /> --}}
                        </div>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">{!! $post->title !!}</h1>
        
                {{-- <h5 class="font-bold">
                    <a href="/?author={{ $post->author->username }}">
                        {{ $post->author->name }}
                    </a>
                </h5>
                <p>
                    <a href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p> --}}
        
            <div class="space-y-4 lg:text-lg leading-loose">
                {!! $post->body !!}
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
             <x-post-comment></x-post-comment>
            </section>
            </article>
            {{-- <a href="/">Back</a>     --}}
        </main> 
    </section>
</x-layout>