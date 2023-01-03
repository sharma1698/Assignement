
<form id="session_form" method="post" action="<?php echo e(route('session.update',['id'=>$id])); ?>"  enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="uname" placeholder="Enter name" value="<?php echo e($specific_array['name']); ?>">
  </div>
  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo e($specific_array['email']); ?>">
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="number" class="form-control" name="mobile" placeholder="Enter mobile" value="<?php echo e($specific_array['mobile']); ?>">
  </div>
  <div class="form-group">
  <label>User Role</label>
  <select name="user_role" >
            <option <?php if($specific_array['user_role'] =="admin"): ?> selected <?php endif; ?> value="admin">Admin</option>
            <option <?php if($specific_array['user_role'] =="user"): ?> selected <?php endif; ?> value="user">USer</option>
        </select>
</div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" name="password" placeholder="Enter password" value="<?php echo e($specific_array['password']); ?>">
  </div>
  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="ufile" placeholder="Enter image">
    <img src="<?php echo e(isset($specific_array['image']) ? asset('/'.$specific_array['image']) :''); ?>" alt="Image" height="20" width="20">
  </div>
  <div class="form-group">
    <label>Date</label>
    <input type="date" class="form-control" name="date" placeholder="Enter date" value="<?php echo e($specific_array['date']); ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php /**PATH C:\xampp\htdocs\project3\resources\views/session/edit.blade.php ENDPATH**/ ?>