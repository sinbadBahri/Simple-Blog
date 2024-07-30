<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <form action="/posts" method="post">
        @csrf
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="' {{ $user->name }} '">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="A new Post">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Post Body</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                          </div>
    
                          <button type="submit" name="submit" class="btn btn-warning">Create</button>
                     
                    </div>
                </div>
            </div>
        </div>
    
    </form>
</x-app-layout>











