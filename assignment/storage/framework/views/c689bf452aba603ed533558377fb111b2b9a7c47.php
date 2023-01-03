<html>
    <head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title></title>
    </head>
    <body>
    <form id="session_form" method="post" action="<?php echo e(url('store-form')); ?>"  enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
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
<?php if(session()->has('main_array') && count(Session::get('main_array'))>0): ?>    
<?php $__currentLoopData = Session::get('main_array'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <tr>
    <td><?php echo e(isset($value['name']) ? $value['name'] : ''); ?></td>
    <td><?php echo e(isset($value['email']) ? $value['email'] : ''); ?></td>
    <td><?php echo e(isset($value['mobile']) ? $value['mobile'] : ''); ?></td>
    <td><?php echo e(isset($value['user_role']) ? $value['user_role'] : ''); ?></td>
    <td><?php echo e(isset($value['password']) ? $value['password'] : ''); ?></td>
    <td><?php echo e(isset($value['date']) ? $value['date'] : ''); ?></td>
    <td><img src="<?php echo e(isset($value['image']) ? asset('/'.$value['image']) :''); ?>" alt="Image" height="10" width="10"/></td>
    <td>
    <form action="<?php echo e(route('session.destroy',['id'=>$key])); ?>" method="POST">
    <a class="btn btn-primary" href="<?php echo e(route('session.edit',['id'=>$key])); ?>">Edit</a>
   <?php echo csrf_field(); ?>
   <?php echo method_field('DELETE'); ?>
   <button type="submit" class="btn btn-danger">Delete</button>
</form>
   </td>
  </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</table>
<div>
<?php if(Session::has('msg')): ?>
<div class="alert alert-success">
  <?php echo e(Session::get('msg')); ?>

</div>
<?php endif; ?>
<!-- <button type="submit" name="final_submit" >Final Submit</button> -->
<a class="btn btn-Success" href="<?php echo e(route('session.final_submit')); ?>">Final Submit</a>
</div>
    </body>
</html><?php /**PATH C:\xampp\htdocs\project3\resources\views/session/index.blade.php ENDPATH**/ ?>