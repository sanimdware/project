<?php
include 'config.php';

// Handle order confirmation
if (isset($_POST['confirm_order'])) {
    $order_id = intval($_POST['order_id']);
    mysqli_query($conn, "UPDATE orders SET status = 'Confirmed' WHERE id = $order_id");
}

$order_query = mysqli_query($conn, "SELECT orders.*, product.name AS product_name, user_info.name AS user_name, user_info.email AS user_email FROM orders JOIN product ON orders.product_id = product.id JOIN user_info ON orders.user_id = user_info.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="MM.png">
    <title>Orders Table</title>
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
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-12 col-md-10 col-lg-8">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center" style="border-radius: 18px 18px 0 0;">
                <h2 class="mb-0" style="font-weight:700;">Orders Table</h2>
            </div>
            <div class="card-body bg-light">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($order_query)): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo htmlspecialchars($row['user_name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['user_email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                    <td><span class="badge bg-info"><?php echo $row['quantity']; ?></span></td>
                                    <td><?php echo $row['order_date']; ?></td>
                                    <td>
                                        <?php if ($row['status'] == 'Confirmed'): ?>
                                            <span class="badge bg-success">Confirmed and Ready to Deliver</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($row['status'] == 'Pending'): ?>
                                            <form method="post" style="display:inline;">
                                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="confirm_order" class="btn btn-success btn-sm">Confirm</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
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