<x-app-layout>

  <body>
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
    {{-- @endsection --}}
  </body>



</x-app-layout>