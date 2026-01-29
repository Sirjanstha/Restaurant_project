<?php 
require_once __DIR__ . '/../includes/functions.php';
$cartCount = getCartCount();
$flash = getFlash();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? escape($pageTitle) . ' - ' : '' ?>Restaurant System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>🍽️ Restaurant System</h1>
            <?php if (isLoggedIn()): ?>
                <div class="user-info">
                    <span>Welcome, <strong><?= escape(getUsername()) ?></strong></span>
                    <?php if (isAdmin()): ?>
                        <span class="badge badge-warning">Admin</span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="index.php">🏠 Menu</a></li>
                
                <?php if (isAdmin()): ?>
                    <li><a href="add_item.php">➕ Add Item</a></li>
                    <li><a href="manage_categories.php">📂 Categories</a></li>
                    <li><a href="admin_orders.php">📊 Orders</a></li>
                <?php endif; ?>
                
                <?php if (isLoggedIn()): ?>
                    <li><a href="view_cart.php">🛒 Cart <?php if ($cartCount > 0): ?><span class="cart-badge"><?= $cartCount ?></span><?php endif; ?></a></li>
                    <li><a href="my_orders.php">📦 My Orders</a></li>
                    <li><a href="logout.php">🚪 Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">🔐 Login</a></li>
                    <li><a href="register.php">📝 Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main class="container">
        <?php if ($flash): ?>
            <div class="flash-message flash-<?= $flash['type'] ?>">
                <?= escape($flash['message']) ?>
            </div>
        <?php endif; ?>
