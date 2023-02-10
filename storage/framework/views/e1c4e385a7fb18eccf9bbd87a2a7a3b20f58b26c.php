<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Jokes List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-secondary text-light">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Jokes List</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="<?php echo e(route('jokes.create')); ?>"> Create Joke</a>
                </div>
            </div>
        </div>
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th>Joke Text</th>
                    <th>Joke Date</th>
                    <th>Author</th>
                    <th width="200px">Category</th>
                    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $jokes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joke): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($joke->joketext); ?></td>
                        <td><?php echo e($joke->jokedate); ?></td>
                        <td>
                            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($author->id == $joke->authorid): ?>
                                    <?php echo method_field('GET'); ?>
                                    <a class="text-white"
                                        href="<?php echo e(route('authors.show', $author->id)); ?>"><?php echo e($author->name); ?></a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <?php $__currentLoopData = $jokeCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jokeCat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($jokeCat->jokeid == $joke->id): ?>
                                    <ul>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($category->id == $jokeCat->categoryid): ?>
                                                <?php echo method_field('GET'); ?>
                                                <li> <a class="text-white"
                                                        href="<?php echo e(route('categories.show', $category->id)); ?>"><?php echo e($category->name); ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                        <td>
                            <form action="<?php echo e(route('jokes.destroy', $joke->id)); ?>" method="Post">
                                <?php echo method_field('EDIT'); ?>
                                <a class="btn btn-primary" href="<?php echo e(route('jokes.edit', $joke->id)); ?>">Edit</a>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $jokes->links(); ?>

    </div>
</body>

</html>
<?php /**PATH /home/hector/Documentos/docker-project/ijdb/resources/views/jokes/index.blade.php ENDPATH**/ ?>