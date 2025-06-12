<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <h1 class="mb-4">Thêm sản phẩm mới</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" action="/webbanhang2/Product/save" onsubmit="return validateForm();">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="form-label">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="/webbanhang2/Product/" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
        </div>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
