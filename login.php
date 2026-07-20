<?php
declare(strict_types=1);
session_start();

if (!empty($_SESSION['auth'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Tài khoản chuẩn của bài tập
    if ($username === 'admin' && $password === 'MiniShop@03') {
        $_SESSION['auth'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    }
    $error = 'Sai thông tin đăng nhập';
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="vi">

<body>
    <h2>Đăng Nhập MiniShop</h2>
    <?php if ($error !== ''): ?>
        <p style="color:red;"><?= h($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <p><label>Username: <input type="text" name="username" required></label></p>
        <p><label>Password: <input type="password" name="password" required></label></p>
        <button type="submit">Đăng nhập</button>
    </form>
</body>

</html>