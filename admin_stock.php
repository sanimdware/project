<?php
include 'config.php';

// Handle stock update
if(isset($_POST['update_stock'])) {
    $product_id = intval($_POST['product_id']);
    $new_stock = max(0, intval($_POST['new_stock'])); // Prevent negative stock
    mysqli_query($conn, "UPDATE product SET stock = $new_stock WHERE id = $product_id");
    echo '<div class="alert alert-success text-center">Stock updated successfully!</div>';
}

$stock_query = mysqli_query($conn, "SELECT * FROM product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="MM.png">
    <title>Stock Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44,62,80,0.12), 0 1.5px 6px rgba(44,62,80,0.08);
        }
        .table thead th {
            background: #007bff;
            color: #fff;
            font-size: 1.1rem;
            letter-spacing: 1px;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .badge {
            font-size: 1em;
            padding: 0.5em 1em;
            border-radius: 8px;
        }
        .stock-form {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .stock-input {
            width: 70px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center" style="border-radius: 18px 18px 0 0;">
                <h2 class="mb-0" style="font-weight:700;">Stock Table</h2>
            </div>
            <div class="card-body bg-light">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Stock</th>
                                <th>Update Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($stock_query)): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" style="width:50px; height:50px; object-fit:cover; border-radius:8px;">
                                    </td>
                                    <td class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td>
                                        <?php if($row['stock'] > 0): ?>
                                            <span class="badge bg-success"><?php echo $row['stock']; ?></span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Out of Stock</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <form method="post" class="stock-form">
                                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                            <input type="number" name="new_stock" class="form-control stock-input" min="0" value="<?php echo $row['stock']; ?>" required>
                                            <button type="submit" name="update_stock" class="btn btn-primary btn-sm">Update</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>