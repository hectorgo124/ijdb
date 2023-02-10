<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CATEGORIES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-secondary text-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Categories List of joke <?php echo e($joke->joketext); ?></h2>
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
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->name); ?></td>
                        <td>
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="Post">
                                <?php echo method_field('EDIT'); ?>
                                <a class="btn btn-primary" href="<?php echo e(route('categories.edit', $category->id)); ?>">Edit</a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <?php echo method_field('GET'); ?>
                                <a class="btn btn-success" href="<?php echo e(route('categories.show', $category->id)); ?>">Show
                                    Jokes</a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>


</body>

</html>
<?php /**PATH /home/hector/Documentos/docker-project/ijdb/resources/views/categories/filter.blade.php ENDPATH**/ ?>