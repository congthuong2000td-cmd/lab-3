<?php include __DIR__ . '/../view/header.php'; ?>
<main>
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>
    <p>Please make sure MySQL is running in XAMPP and the database <code>my_guitar_shop1</code> is created.</p>
    <p class="last_paragraph"><strong>Error message:</strong> <?php echo htmlspecialchars($error_message); ?></p>
</main>
<?php include __DIR__ . '/../view/footer.php'; ?>
