<x-layout>
    <x-setting heading="Publish new Post">
        <form action="/admin/posts/" method="post">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt"/>
            <x-form.textarea name="body"/>

            <x-form.field>
                <x-form.label name="category">
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category_id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
            </x-form.field>
            <x-form.button>Create</x-form.button>
        </form>
    </x-setting>
</x-layout>