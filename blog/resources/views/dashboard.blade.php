<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->created_at }}</h6>
                        <p class="card-text">{{substr($post->description, 0, 170)}} ...</p>
                        <a href="/posts/{{ $post->id }}/edit" class="card-link">edit</a>
                        <a href="#" class="card-link">comments</a>
                      </div>
                    </div>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
