<?php
session_start();
require_once 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/hero-bg.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 100px 0;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Community Platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4">Welcome to Community Platform</h1>
            <p class="lead">Connect, share, and grow with our vibrant community.</p>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="register.php" class="btn btn-primary btn-lg">Join Now</a>
            <?php endif; ?>
        </div>
    </section>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2>Why Join Us?</h2>
            <p class="text-muted">Explore the benefits of being part of our platform</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-people fs-1 text-primary"></i>
                        <h5 class="card-title mt-3">Community Connections</h5>
                        <p class="card-text">Engage with like-minded individuals and grow your network.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-chat-dots fs-1 text-success"></i>
                        <h5 class="card-title mt-3">Interactive Discussions</h5>
                        <p class="card-text">Join conversations and share your thoughts with the community.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-lightbulb fs-1 text-warning"></i>
                        <h5 class="card-title mt-3">Learn and Grow</h5>
                        <p class="card-text">Access resources and insights to expand your knowledge.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; <?php echo date('Y'); ?> Community Platform. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
