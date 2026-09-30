<?php include __DIR__ . '/../view/header.php'; ?>
<main>
    <h1>Error</h1>
    <p class="first_paragraph"><?php echo htmlspecialchars($error); ?></p>
    <p><a href="index.php">Back to Main Page</a></p>
</main>
<?php include __DIR__ . '/../view/footer.php'; ?>
