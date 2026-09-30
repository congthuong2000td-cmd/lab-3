<?php include '../view/header.php'; ?>
<main>
    <h2>Category List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo htmlspecialchars($category['categoryName']); ?></td>
            <td>
                <!-- Nút Sửa (Edit) -->
                <form action="index.php" method="post" class="inline">
                    <input type="hidden" name="action" value="show_edit_category">
                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Edit" class="btn-edit">
                </form>
                <!-- Nút Xóa (Delete) -->
                <form action="index.php" method="post" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="category_id" value="<?php echo $category['categoryID']; ?>">
                    <input type="submit" value="Delete" class="btn-delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if (isset($edit_category) && $edit_category) : ?>
    <!-- Form Sửa danh mục -->
    <h2>Edit Category</h2>
    <form action="index.php" method="post" id="edit_category_form">
        <input type="hidden" name="action" value="update_category">
        <input type="hidden" name="category_id" value="<?php echo $edit_category['categoryID']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit_category['categoryName']); ?>" required>
        <input type="submit" value="Update" class="btn-add">
        <a href="index.php?action=list_categories" style="margin-left: 10px;">Cancel</a>
    </form>
    <br>
    <?php endif; ?>

    <!-- Form Thêm danh mục mới -->
    <h2>Add Category</h2>
    <form action="index.php" method="post" id="add_category_form">
        <input type="hidden" name="action" value="add_category">
        <label>Name:</label>
        <input type="text" name="name" required>
        <input type="submit" value="Add" class="btn-add">
    </form>

    <br>
    <p><a href="index.php?action=list_products">List Products</a></p>
    <p><a href="../product_catalog/">Product Catalog</a></p>
</main>
<?php include '../view/footer.php'; ?>
