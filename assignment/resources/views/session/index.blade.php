<html>
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
    </head>
    <body>
    <form id="session_form" method="post" action="{{url('store-form')}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="uname" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="mobile" placeholder="Enter mobile">
  </div>
  <div class="form-group">
  <label>User Role</label>
  <select name="user_role" >
            <option value="admin">Admin</option>
            <option value="user">USer</option>
        </select>
</div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="password" placeholder="Enter password">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="ufile" placeholder="Enter image">
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date" placeholder="Enter date">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>User Role</th>
    <th>Password</th>
    <th>Date</th>
    <th>Image</th>
    <th>Action</th>
  </tr>
@if(session()->has('main_array') && count(Session::get('main_array'))>0)    
@foreach(Session::get('main_array') as $key=>$value)
  <tr>
    <td>{{isset($value['name']) ? $value['name'] : '' }}</td>
    <td>{{isset($value['email']) ? $value['email'] : ''}}</td>
    <td>{{isset($value['mobile']) ? $value['mobile'] : ''}}</td>
    <td>{{isset($value['user_role']) ? $value['user_role'] : ''}}</td>
    <td>{{isset($value['password']) ? $value['password'] : ''}}</td>
    <td>{{isset($value['date']) ? $value['date'] : ''}}</td>
    <td><img src="{{isset($value['image']) ? asset('/'.$value['image']) :''}}" alt="Image" height="10" width="10"/></td>
    <td>
    <form action="{{ route('session.destroy',['id'=>$key]) }}" method="POST">
    <a class="btn btn-primary" href="{{route('session.edit',['id'=>$key]) }}">Edit</a>
   @csrf
   @method('DELETE')
   <button type="submit" class="btn btn-danger">Delete</button>
</form>
   </td>
  </tr>
@endforeach
@endif
</table>
<div>
@if(Session::has('msg'))
<div class="alert alert-success">
  {{ Session::get('msg')}}
</div>
@endif
<!-- <button type="submit" name="final_submit" >Final Submit</button> -->
<a class="btn btn-Success" href="{{route('session.final_submit') }}">Final Submit</a>
</div>
    </body>
</html>