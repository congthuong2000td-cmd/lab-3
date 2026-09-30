<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">

        <div class="form-row">
            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo htmlspecialchars($category['categoryName']); ?>
                </option>
            <?php endforeach; ?>
            </select>
        </div>

        <div class="form-row">
            <label>Code:</label>
            <input type="text" name="code" required>
        </div>

        <div class="form-row">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-row">
            <label>List Price:</label>
            <input type="text" name="price" required placeholder="e.g. 550.00">
        </div>

        <div class="form-row">
            <label>&nbsp;</label>
            <input type="submit" value="Add Product" class="btn-add">
        </div>
    </form>
    <p><a href="index.php?action=list_products">View Product List</a></p>
</main>
<?php include '../view/footer.php'; ?>
