<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /controllers/AdminController.php"); // Chuyển hướng tới trang đăng nhập nếu chưa đăng nhập
    exit();
}
require_once 'Database.php';
$db = new Database();
$conn = $db->connect();
$id = $_GET['id'];
if (!is_numeric($id)) {
    echo "ID không hợp lệ.";
    exit();
}
try {
    $sql_by_id = "SELECT * FROM news WHERE id = :id";
    $stmt = $conn->prepare($sql_by_id);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    $news = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$news) {
        echo "Không tìm thấy bài viết.";
        exit();
    }
    echo "Tiêu đề bài viết: " . $news['title'];

} catch (PDOException $e) {
    echo "Lỗi kết nối hoặc truy vấn: " . $e->getMessage();
}
// Đóng kết nối
$db->disconnect();
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .font-title {
            font-size: 2.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .font-title:hover {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<header class="p-3 text-white" style="background-color: #6351ce">
    <div class="container py-3" >
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <!-- Logo -->
            <img src="https://inkythuatso.com/uploads/thumbnails/800/2021/12/logo-dai-hoc-thuy-loi-inkythuatso-converted-01-23-08-45-05.jpg"
                 alt="Logo Đại học Thủy Lợi"
                 width="150"
                 class="me-3">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white font-title">Báo Thủy Lợi</a></li>
            </ul>
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
            <div class="text-end d-flex gap-2">
                <?php if ($is_logged_in): ?>
                    <a href="" class="btn btn-danger">Đăng xuất</a>
                <?php else: ?>
                    <a href=".../controllers/AdminController.php" class="btn btn-primary">Đăng nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</header>
<div class="container py-3">
    <div>
        <h2><?php echo htmlspecialchars($news['title']); ?></h2>
    </div>
    <div class="card-body">
        <p class="text-muted">Ngày đăng: <?php echo htmlspecialchars(news['created_at']); ?></p>
        <hr>
        <img src="<?php echo htmlspecialchars($news['image']);?>" alt="" width="300">
        <p><?php echo htmlspecialchars(news['content']); ?></p>
    </div>
    <div class="card-footer text-right">
        <a href=".../views/home/index.php" class="btn btn-secondary">Quay lại trang chủ</a>
    </div>
</div>
</div>
<!-- Footer -->
<div class="container my-5">
    <footer
        class="text-center text-lg-start text-white"
        style="background-color: #1c2331"
    >
        <section
            class="d-flex justify-content-between p-4"
            style="background-color: #6351ce"
        >
            <div class="me-5">
                <span>Get connected with us on social networks:</span>
            </div>
            <div>
                <a href="" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="text-white me-4">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </section>
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">Báo Thủy Lợi </h6>
                        <hr
                            class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px"
                        />
                        <p>
                            Tin tức mới nhất, Việt Nam và thế giới
                        </p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Thành viên nhóm</h6>
                        <hr
                            class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px"
                        />
                        <p>Lê Sỹ Thắng</p>
                        <p>Bùi Viết Hiển</p>
                        <p>Ngô Thị Ngọc Ánh</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Giáo viên hướng dẫn</h6>
                        <p>Kiều Tuấn Dũng</p>
                        <p>Tạ Chí Hiếu</p>
                    </div>
                </div>
            </div>
        </section>

    </footer>
</div>
</body>
</html>