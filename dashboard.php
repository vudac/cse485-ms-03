<?php
declare(strict_types=1);
session_start();

// Guard: Chặn nếu chưa đăng nhập
if (empty($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
}

require_once __DIR__ . '/data.php';
$totalValue = inventoryValueFromObjects($productObjects);

// Lưu Order vào Session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'order') {
    $sku = trim($_POST['sku'] ?? '');
    $qty = (int) ($_POST['qty'] ?? 0);
    if ($sku !== '' && $qty > 0) {
        $_SESSION['orders'][] = ['sku' => $sku, 'qty' => $qty, 'at' => date('H:i:s')];
    }
    header('Location: dashboard.php');
    exit;
}
$orders = $_SESSION['orders'] ?? [];

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Dashboard</h1>
    <p>Xin chào, <strong><?= h($_SESSION['username']) ?></strong> | <a href="logout.php">Đăng xuất</a></p>
    <p>Tổng giá trị kho: <strong><?= number_format($totalValue) ?> đ</strong></p>

    <table>
        <tr>
            <th>SKU</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>SL</th>
            <th>Thành tiền</th>
            <th>Mức tồn</th>
        </tr>
        <?php foreach ($productObjects as $p): ?>
            <tr>
                <td><?= h($p->sku) ?></td>
                <td><?= h($p->name) ?></td>
                <td><?= h($categoryMap[$p->categoryId] ?? '—') ?></td>
                <td><?= number_format($p->price) ?></td>
                <td><?= $p->qty ?></td>
                <td><?= number_format($p->lineTotal()) ?></td>
                <td><?= h($p->stockLevel()) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <hr>
    <h3>Đặt thử (Lưu Session)</h3>
    <form method="post">
        <input type="hidden" name="action" value="order">
        <select name="sku">
            <?php foreach ($productObjects as $p): ?>
                <option value="<?= h($p->sku) ?>"><?= h($p->name) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="qty" value="1" required>
        <button type="submit">Đặt hàng</button>
    </form>

    <ul>
        <?php foreach ($orders as $item): ?>
            <li><?= h($item['sku']) ?> - SL: <?= $item['qty'] ?> (<?= $item['at'] ?>)</li>
        <?php endforeach; ?>
    </ul>

</body>

</html>
<!-- MS_EXPECT product_count=<?= count($productObjects) ?> inventory_value=<?= $totalValue ?> -->