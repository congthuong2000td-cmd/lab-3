<?php include '../view/header.php'; ?>
<main>
    <h1>Product List</h1>
    <div class="clearfix">
        <aside>
            <!-- display a list of categories -->
            <h2>Categories</h2>
            <nav>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?action=list_products&amp;category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo htmlspecialchars($category['categoryName']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>

        <section>
            <!-- display a table of products -->
            <h2><?php echo htmlspecialchars($category_name); ?></h2>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php if (empty($products)) : ?>
                <tr>
                    <td colspan="4" style="text-align: center; color: #6b7280;">No products in this category.</td>
                </tr>
                <?php else : ?>
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['productCode']); ?></td>
                    <td><?php echo htmlspecialchars($product['productName']); ?></td>
                    <td class="right"><?php echo number_format($product['listPrice'], 2); ?></td>
                    <td>
                        <form action="index.php" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                            <input type="hidden" name="action" value="delete_product">
                            <input type="hidden" name="product_id" value="<?php echo $product['productID']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['categoryID']; ?>">
                            <input type="submit" value="Delete" class="btn-delete">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <p><a href="?action=show_add_form">Add Product</a></p>
            <p><a href="?action=list_categories">List Categories</a></p>
        </section>
    </div>
</main>
<?php include '../view/footer.php'; ?>
