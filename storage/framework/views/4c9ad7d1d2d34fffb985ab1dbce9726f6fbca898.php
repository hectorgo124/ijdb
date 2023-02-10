<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IJDB</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>


<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-secondary">
    <div class="m-0 mt-5 row justify-content-center align-items-center">
        <div class="col-6 bg-dark p-5 text-center text-light border border-light rounded shadow-lg">
            <p> Welcome to IJDB Project, developed by Juan Cruz Ortiz, Javier Jiménez and Hector Granell. </p>
            <p> 2 DAW </p>
        </div>


    </div>

    <div class="m-0 mt-5 row justify-content-center align-items-center ">
        <div class="col-6 bg-dark p-5 text-center text-light border border-light rounded shadow-lg">
            <p>RANDOM JOKE: </p>
            <?php
                use App\Http\Controllers\JokeController;
                use App\Http\Controllers\AuthorController;
                use Illuminate\Support\Facades\DB;
                
                $jokes = DB::table('jokes')->get();
                
                $joke = $jokes[rand(0, count($jokes) - 1)];
                
                echo $joke->joketext;
                
                $authors = DB::table('authors')->get();
                
                foreach ($authors as $author) {
                    if ($author->id == $joke->authorid) {
                        $au = '<br><br>AUTHOR: - ';
                        $au = $au . $author->name;
                
                        break;
                    }
                }
            ?>
            <br>
            <?php echo method_field('GET'); ?>
            <a class="text-white" href="<?php echo e(route('authors.show', $author->id)); ?>">Author: <?php echo e($author->name); ?></a>



        </div>
    </div>

    <div class="m-0 mt-5 row justify-content-center align-items-center">
        <div class="col-6 bg-dark p-5 text-center text-light border border-light rounded shadow-lg">
            <p>LAST JOKE: </p>
            <?php
                
                $joke = DB::table('jokes')
                    ->latest('created_at')
                    ->first();
                echo $joke->joketext;
                
                $authors = DB::table('authors')->get();
                
                foreach ($authors as $author) {
                    if ($author->id == $joke->authorid) {
                        $au = '<br><br>AUTHOR: - ';
                        $au = $au . $author->name;
                
                        break;
                    }
                }
            ?>
            <br>
            <?php echo method_field('GET'); ?>
            <a class="text-white" href="<?php echo e(route('authors.show', $author->id)); ?>">Author: <?php echo e($author->name); ?></a>
        </div>
    </div>
</body>

</html>
<?php /**PATH /home/hector/Documentos/docker-project/ijdb/resources/views/home.blade.php ENDPATH**/ ?>