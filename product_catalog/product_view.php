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
            <h1><?php echo htmlspecialchars($name); ?></h1>
            <div id="left_column" style="float: left; width: 220px; margin-right: 20px;">
                <p>
                    <img src="<?php echo $image_filename; ?>" alt="<?php echo $image_alt; ?>" style="max-width: 200px; border: 1px solid #e5e7eb; border-radius: 4px;" onerror="this.style.display='none'">
                </p>
            </div>

            <div id="right_column" style="float: left; width: 350px;">
                <p><strong>List Price:</strong> $<?php echo number_format($list_price, 2); ?></p>
                <p><strong>Discount:</strong> <?php echo $discount_percent; ?>%</p>
                <p><strong>Your Price:</strong> $<?php echo number_format($unit_price, 2); ?> 
                   <span style="color: #059669;">(Save $<?php echo number_format($discount_amount, 2); ?>)</span>
                </p>
                <form action="<?php echo $app_path; ?>cart" method="post" style="margin-top: 15px;">
                    <input type="hidden" name="action" value="add">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <label>Quantity:</label>
                    <input type="text" name="quantity" value="1" size="2">
                    <br><br>
                    <input type="submit" value="Add to Cart" class="btn-add">
                </form>
            </div>
        </section>
    </div>
</main>
<?php include '../view/footer.php'; ?>
