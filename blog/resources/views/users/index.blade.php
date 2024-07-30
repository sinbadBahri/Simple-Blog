<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Users List') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                
              @section('content')
    @foreach ($users as $user)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Created Date</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <th><a href="{{ route('all-users.edit', $user->id) }}">{{ $user->name }}</a></th>
              <td>{{ $user->email }}</td>
              <td>
                <ul>
                  @foreach ($user->roles as $role)
                    <li>
                      {{ $role->name }}
                    </li>

                  @endforeach
                </ul>  
              </td>
              <td>{{ Hekmatinasser\Verta\Verta::instance($user->created_at)->formatWord('l dS F') }}</td>
            </tr>
        </tbody>
      </table>
  
              
    @endforeach  
              
             
            </div>
        </div>
    </div>
</div>




</x-app-layout>