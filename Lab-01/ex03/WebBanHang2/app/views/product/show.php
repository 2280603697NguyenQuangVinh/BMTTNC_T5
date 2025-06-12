<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1 class="mb-4">Chi tiết sản phẩm</h1>

    <div class="card mb-3 shadow" style="max-width: 700px;">
        <div class="row g-0">
            <?php if (!empty($product->image)): ?>
                <div class="col-md-4">
                    <img src="/webbanhang2/<?php echo htmlspecialchars($product->image); ?>" 
                         class="img-fluid rounded-start" alt="Ảnh sản phẩm">
                </div>
            <?php endif; ?>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="card-text"><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                    <p class="card-text"><strong>Danh mục:</strong> 
                        <?php echo htmlspecialchars($product->category_name ?? 'Chưa có danh mục', ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                    <p class="card-text"><?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>

                    <a href="/webbanhang2/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary">
                        Thêm vào giỏ hàng
                    </a>
                    <a href="/webbanhang2/Product/list" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
