<x-guest-layout>
  
    @foreach ($posts as $post)
        
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->created_at }}</h6>
        <p class="card-text">{{substr($post->description, 0, 170)}} ...</p>
        <a href="#" class="card-link">edit</a>
        <a href="#" class="card-link">comments</a>
      </div>
    </div>
    @endforeach
  
  </x-guest-layout>