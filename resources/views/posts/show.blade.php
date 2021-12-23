<x-layout>
    <section>
        <main>
            <article>
                <h1>{!! $post->title !!}</h1>
        
                <h5 class="font-bold">
                    <a href="/?author={{ $post->author->username }}">
                        {{ $post->author->name }}
                    </a>
                </h5>
                <p>
                    <a href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p>
        
            <div class="space-y-4 lg:text-lg leading-loose">{!! $post->body !!}</div>
        
            </article>
            <a href="/">Back</a>    
        </main>
    </section>
</x-layout>