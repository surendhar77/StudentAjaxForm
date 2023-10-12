<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <h1>Student Details </h1>
        <a class="btn btn-success" href="javascript:void(0)" id="createNewStudent"> Create New Student</a>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Phone Number</th>
                    <th>Country</th>
                    <th>Address</th>
                    <th>Profile Photo</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>

            <tbody id="student_data">
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($student->id); ?></td>
                    <td><?php echo e($student->first_name); ?></td>
                    <td><?php echo e($student->last_name); ?></td>
                    <td>
                        <?php if($student->gender==0): ?>
                        male
                        <?php else: ?>
                        Female
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($student->phone_number); ?></td>
                    <td><?php if($student->country==0): ?>
                        India
                        <?php elseif($student->country==1): ?>
                        Srilanka
                        <?php elseif($student->country==2): ?>
                        Bangaladesh
                        <?php else: ?>
                        Pakisthan
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($student->address); ?></td>
                    <td><img src="student/<?php echo e($student->image); ?>" id="image" height="100" width="100"></td>
                    <td>
                        <a href="#" class="btn btn-primary edit" data-id="<?php echo e($student->id); ?>" data-fname="<?php echo e($student->first_name); ?>" data-number="<?php echo e($student->phone_number); ?>"
                  data-lname="<?php echo e($student->last_name); ?>"     data-gender="<?php echo e($student->gender); ?>" data-country="<?php echo e($student->country); ?>" data-address="<?php echo e($student->address); ?>" data-img="<?php echo e($student->image); ?>">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="<?php echo e($student->id); ?>" 
                        >Delete</a>
                    </td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- create-->
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="studentForm" name="studentForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('student.add')); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- <input type="hidden" name="student_id" id="student_id"> -->
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="first_name" id="first_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="last_name" id="last_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phone number</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="form-label">Country</label>
                            <select  class="form-select" name="country" id="country">
                                <option selected>Choose...</option>
                                <option value="0">India</option>
                                <option value="1">Srilanka</option>
                                <option value="2">Bangaladesh</option>
                                <option value="3">Pakisthan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="0">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <textarea id="address" name="address" placeholder="Enter Your Address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Profile photo</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="add" value="create">Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Edit-->
    <div class="modal fade" id="editModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="studenteditForm" name="studenteditForm" method="POST" enctype="multipart/form-data" action="<?php echo e(route('student.update')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="student_id" id="student_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="first_name" id="fname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-12">
                                <input type="text" name="last_name" id="lname" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Phone number</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="p_number" name="phone_number" placeholder="Enter Phone Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Country" class="form-label">Country</label>
                            <select  class="form-select" name="country" id="countries">
                                <!-- <option selected>Choose...</option> -->
                                <option value="0">India</option>
                                <option value="1">Srilanka</option>
                                <option value="2">Bangaladesh</option>
                                <option value="3">Pakisthan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="0">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="1">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-12">
                                <textarea id="address" name="address" placeholder="Enter Your Address" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Profile photo</label>
                            <div class="col-sm-12">
                            <img id="img1" src="">
                                
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="update" value="update">Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Delete-->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Contact</h5>
                <button type="button" class="close cancel" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Are you sure you want to delete this Data?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger deleteStudent">Yes, Delete Data</button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    //   Student Code
    $(document).ready(function() {

        $('#createNewStudent').click(function(e) {
            $('#ajaxModel').modal('show');

            $('#add').click(function(e) {
                e.preventDefault();
                let formData = new FormData($('#studentForm')[0]);
                $.ajax({
                    url: "<?php echo e(route('student.add')); ?>",
                    data: formData,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#studentForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        location.reload();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#add').html('add');

                    }
                });
            });
        });
    });
    $(".edit").click(function(e) {
        e.preventDefault();
        $('#editModel').modal('show');
        var id = $(this).data('id');
        var fname = $(this).data('fname');
        var lname= $(this).data('lname');
        var country= $(this).data('country');
        var gender =$(this).data('gender');
        var address =$(this).data('address');
        var number =$(this).data('number');
        var image =$(this).data('img')
        var i ="<?php echo e(asset('student',"+image+")); ?>";
        alert(i);
        $("#update").val(id);
        if(gender == 0)
        {
            $('input[name=gender][value=0]').attr('checked', true); 
        }
        else{
            $('input[name=gender][value=1]').attr('checked', true); 
        }
        if(country == 0)
        {

        }
        else if(country == 1)
        {

        }

        else if(country == 2 )
        {

        }
        else
        {

        }
        $('#fname').val(fname);
        $("#lname").val(lname);
        $("#address").val(address);
        $("#p_number").val(number);
        $('#img_path_').attr('src').val(image)
        $('textarea#address').val(address);
    });
    $(".delete").click(function(e)
    {
        e.preventDefault();
        $('#deleteModal').modal('show');
        var id = $(this).data('id');
       $('.deleteStudent').val(id);
    });
    $('.deleteStudent').click(function(e)
    {
         var id=$(this).val();
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
        $.ajax({
                    url: "<?php echo e(route('student.delete', '')); ?>/"+id,
                    data: id,
                    method: "DELETE",
                    success: function(data) {
                        $('#deleteModel').modal('hide');
                        alert(data.status);
                        location.reload();

                    },
                });
    });
    $('.cancel').click(function(e)
    {
        $('#deleteModal').modal('hide');
    });
   
</script>

</html><?php /**PATH C:\xampp\htdocs\studentform\resources\views/student.blade.php ENDPATH**/ ?>