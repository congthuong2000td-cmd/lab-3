<?php include '../view/header.php'; ?>
<main>
    <div class="clearfix">
        <aside>
            <h2>Categories</h2>
            <nav>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo htmlspecialchars($category['categoryName']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>

        <section>
            <h2><?php echo htmlspecialchars($category_name); ?></h2>
            <ul style="list-style-type: none; padding: 0;">
                <?php if (empty($products)) : ?>
                    <li style="color: #6b7280;">No products in this category.</li>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                    <li style="margin-bottom: 10px;">
                        <a href="?action=view_product&amp;product_id=<?php echo $product['productID']; ?>" style="font-weight: 600; font-size: 15px;">
                            <?php echo htmlspecialchars($product['productName']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </section>
    </div>
</main>
<?php include '../view/footer.php'; ?>
