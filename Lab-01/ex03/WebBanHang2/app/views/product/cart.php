<?php include 'app/views/shares/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

<div class="container py-5">
    <h1 class="mb-5">Giỏ hàng của bạn</h1>
    <?php if (!empty($cart)): ?>
        <form method="post" action="/webbanhang2/Product/updateCart">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Cart Items -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php
                            $total = 0;
                            foreach ($cart as $id => $item):
                                $itemTotal = $item['price'] * $item['quantity'];
                                $total += $itemTotal;
                            ?>
                                <div class="row cart-item mb-3 align-items-center">
                                    <div class="col-md-3">
                                        <img src="/webbanhang2/<?php echo htmlspecialchars($item['image']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title mb-1"><?php echo htmlspecialchars($item['name']); ?></h5>
                                        <p class="text-muted mb-2">Giá: <?php echo number_format($item['price']); ?> VND</p>
                                        <p class="text-muted">Thành tiền: <?php echo number_format($itemTotal); ?> VND</p>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input-group input-group-sm">
                                            <div class="d-flex align-items-center gap-1">
                                                <button type="submit" name="action" value="decrease-<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">−</button>
                                                <input type="text" class="form-control form-control-sm text-center" value="<?php echo $item['quantity']; ?>" style="width: 60px;" readonly>
                                                <button type="submit" name="action" value="increase-<?php echo $id; ?>" class="btn btn-outline-secondary btn-sm">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <button type="submit" name="action" value="remove-<?php echo $id; ?>" class="btn btn-sm btn-outline-danger" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Continue Shopping -->
                    <div class="text-start mb-4">
                        <a href="/webbanhang2/Product" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                        </a>
                        <button type="submit" name="action" value="clear" class="btn btn-outline-danger ms-2">
                            <i class="bi bi-x-circle"></i> Xóa toàn bộ giỏ hàng
                        </button>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="card cart-summary">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Tóm tắt đơn hàng</h5>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Tổng cộng</span>
                                <span><?php echo number_format($total); ?> VND</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <strong>Thanh toán</strong>
                                <strong><?php echo number_format($total); ?> VND</strong>
                            </div>
                            <a href="/webbanhang2/Product/checkout" class="btn btn-primary w-100">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php else: ?>
        <div class="alert alert-info text-center">Giỏ hàng của bạn đang trống.</div>
        <a href="/webbanhang2/Product" class="btn btn-outline-primary">Quay lại mua sắm</a>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>