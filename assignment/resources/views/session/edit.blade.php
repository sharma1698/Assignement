
<form id="session_form" method="post" action="{{route('session.update',['id'=>$id])}}"  enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="uname" placeholder="Enter name" value="{{$specific_array['name']}}">
  </div>
  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$specific_array['email']}}">
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="mobile" placeholder="Enter mobile" value="{{$specific_array['mobile']}}">
  </div>
  <div class="form-group">
  <label>User Role</label>
  <select name="user_role" >
            <option @if($specific_array['user_role'] =="admin") selected @endif value="admin">Admin</option>
            <option @if($specific_array['user_role'] =="user") selected @endif value="user">USer</option>
        </select>
</div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="password" placeholder="Enter password" value="{{$specific_array['password']}}">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="ufile" placeholder="Enter image">
    <img src="{{isset($specific_array['image']) ? asset('/'.$specific_array['image']) :''}}" alt="Image" height="20" width="20">
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date" placeholder="Enter date" value="{{$specific_array['date']}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
