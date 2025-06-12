<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <h1 class="mb-4">Danh sách sản phẩm</h1>
    <a href="/webbanhang2/Product/add" class="btn btn-success mb-4">Thêm sản phẩm mới</a>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <?php if ($product->image): ?>
                        <img src="/webbanhang2/<?php echo $product->image; ?>" class="card-img-top" alt="Product Image" style="object-fit: cover; height: 200px;">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            <a href="/webbanhang2/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text text-truncate">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        <p class="mb-1"><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                        <p class="mb-3"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name ?? 'Chưa có', ENT_QUOTES, 'UTF-8'); ?></p>

                        <div class="mt-auto d-grid gap-2">
                            <a href="/webbanhang2/Product/show/<?php echo $product->id; ?>" class="btn btn-info btn-sm">Xem Chi Tiết</a>
                            <a href="/webbanhang2/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary btn-sm">Thêm vào giỏ hàng</a>
                            <a href="/webbanhang2/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="/webbanhang2/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
