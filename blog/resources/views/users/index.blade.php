<x--app-layout>


  <body>
    @foreach ($users as $user)
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          
            <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
            </tr>
        </tbody>
      </table>
  
              
    @endforeach  
  </body>



</x--app-layout>