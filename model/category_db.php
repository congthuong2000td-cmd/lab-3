<?php
// Lấy danh sách tất cả các danh mục
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

// Lấy tên của danh mục theo ID
function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category ? $category['categoryName'] : '';
    return $category_name;
}

// Lấy thông tin chi tiết một danh mục theo ID (dùng khi sửa)
function get_category($category_id) {
    global $db;
    $query = 'SELECT * FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    return $category;
}

// Thêm danh mục mới (Yêu cầu bài tập Chương 5)
function add_category($name) {
    global $db;
    $query = 'INSERT INTO categories (categoryName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();
}

// Xóa danh mục (Yêu cầu bài tập Chương 5)
function delete_category($category_id) {
    global $db;
    // Xóa các sản phẩm thuộc danh mục này trước để tránh lỗi khóa ngoại (Foreign Key)
    $queryProducts = 'DELETE FROM products
                      WHERE categoryID = :category_id';
    $statementProducts = $db->prepare($queryProducts);
    $statementProducts->bindValue(':category_id', $category_id);
    $statementProducts->execute();
    $statementProducts->closeCursor();

    // Xóa danh mục
    $query = 'DELETE FROM categories
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

// Sửa / Cập nhật danh mục
function update_category($category_id, $name) {
    global $db;
    $query = 'UPDATE categories
              SET categoryName = :name
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>
