<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Phone</th> 
            <th>Created</th>   
        </tr>
    </thead>
    @foreach($users as $user)
        <tr>
           <td>{{$user->id}}</td>
           <td>{{$user->fullname}}</td>
           <td>{{$user->gender}}</td>
           <td>{{Carbon\Carbon::parse($user->birthdate)->diffForHumans() }}</td>
           <td>{{$user->phone}}</td>
           <td>{{Carbon\Carbon::parse($user->create_at)->diffForHumans() }}</td>
           
    @endforeach
</table>