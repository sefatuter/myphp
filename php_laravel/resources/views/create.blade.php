<!-- create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <h1>Create a New Post</h1>

    <!-- Show validation errors -->
    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <?php
    /* equivalent to:
    
    <?php if ($errors->any()): ?>
        <ul>
            <?php foreach ($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    */


    /*
    
    🧠 Comparison: Blade vs PHP
    Task	            Blade Syntax	            Equivalent Raw PHP
    Echo variable	    {{ $title }}	            <?php echo $title; ?>
    If statement	    @if ($x)	                <?php if ($x): ?>
    Loop	            @foreach ($items as $item)	<?php foreach ($items as $item): ?>
    CSRF	            @csrf	                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    
    */?>

    <!-- Form -->
    <form method="POST" action="/posts">
        @csrf <!-- CSRF protection -->
        <label>Title:</label>
        <input type="text" name="title"><br><br>

        <label>Content:</label>
        <textarea name="content"></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
