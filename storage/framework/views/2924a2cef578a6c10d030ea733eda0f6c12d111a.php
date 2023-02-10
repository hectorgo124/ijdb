<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AUTHORS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-secondary text-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Authors List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="<?php echo e(route('authors.create')); ?>"> Add author </a>
                </div>
            </div>
        </div>
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <table class="table table-bordered table-hover table-dark text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($author->id); ?></td>
                        <td><?php echo e($author->name); ?></td>
                        <td><?php echo e($author->email); ?></td>
                        <td>
                            <?php $__currentLoopData = $authorroles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auRol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($auRol->authorid == $author->id): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($role->id == $auRol->roleid): ?>
                                            > <?php echo e($role->description); ?> <br>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </td>
                        <td>
                            <form action="<?php echo e(route('authors.destroy', $author->id)); ?>" method="Post">
                                <?php echo method_field('EDIT'); ?>
                                <a class="btn btn-primary" href="<?php echo e(route('authors.edit', $author->id)); ?>">Edit</a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <?php echo method_field('GET'); ?>
                                <a class="btn btn-success" href="<?php echo e(route('authors.show', $author->id)); ?>">Show
                                    Jokes</a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $authors->links(); ?>

    </div>
</body>

</html>
<?php /**PATH /home/hector/Documentos/docker-project/ijdb/resources/views/authors/index.blade.php ENDPATH**/ ?>