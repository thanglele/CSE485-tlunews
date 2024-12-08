<h1>Danh sách danh mục</h1>
<a href="index.php?controller=category&action=add">Thêm danh mục mới</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($categories as $category): ?>
    <tr>
        <td><?= $category['id'] ?></td>
        <td><?= $category['name'] ?></td>
        <td>
            <a href="index.php?controller=category&action=edit&id=<?= $category['id'] ?>">Sửa</a> |
            <a href="index.php?controller=category&action=delete&id=<?= $category['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
