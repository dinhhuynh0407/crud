<?php   
// Thông tin kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Tạo kết nối
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Câu lệnh INSERT INTO
    $sql = "INSERT INTO products (id, name, description, img, price, quantity, productscol, categorles_id) VALUES (null, :name, :description, :img, :price, :quantity, :productscol, :categorles_id)";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho các tham số
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':productscol', $productscol);
    $stmt->bindParam(':categorles_id', $categorles_id);
    
    // Gán giá trị cho các biến
    $name = 'name';
    $description = 'description';
    $img = 'img';
    $price = 'price';
    $quantity = 'quantity';
    $productscol = 'productscol';
    $categorles_id = 'categorles_id';
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    echo "Record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;