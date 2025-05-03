<?php require 'views/layouts/header.php'; ?>
<?php if($internal_error === true) : ?>
<h2>⚠️ Server Error</h2>
<p>Something went wrong. Our agents are on it.</p>
<?php endif; ?>
<?php require 'views/layouts/footer.php'; ?>
