<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($posts as $post)
        
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Deleted At: {{ $post->deleted_at }}</h6>
                        <p class="card-text">{{substr($post->description, 0, 170)}} ...</p>
                        <a href="/posts/trashed/{{ $post->id }}">
                        
                            <button type="submit" name="submit" class="btn btn-outline-primary">Restore</button>
                        </a>
                        <br>
                        <br>
                        <form action="/posts/trashed/{{ $post->id }}" method="post">
                            @csrf

                            <input type="hidden" name="_method", value="DELETE">
                            <button type="submit" name="submit" class="btn btn-outline-dark">Delete  Permanently</button>
                        </form>
                      </div>
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
