<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle search
$search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';
$stmt = $conn->prepare("SELECT id, username, email, bio, profile_image, created_at FROM users 
                       WHERE username LIKE ? OR email LIKE ? 
                       ORDER BY created_at DESC");
$stmt->bind_param("ss", $search, $search);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Directory - Community Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                <i class="bx bxs-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="members.php">
                                <i class="bx bxs-user-detail"></i> Member Directory
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="bx bxs-user-circle"></i> My Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Member Directory</h1>
                </div>

                <!-- Search Form -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <form class="d-flex" method="GET" action="members.php">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search members..." 
                                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>

                <!-- Member List -->
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php while ($member = $result->fetch_assoc()): ?>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="<?php echo $member['profile_image'] ?: 'images/default-avatar.png'; ?>" 
                                             class="rounded-circle me-3" width="50" height="50" alt="Profile Image">
                                        <div>
                                            <h5 class="card-title mb-0"><?php echo htmlspecialchars($member['username']); ?></h5>
                                            <small class="text-muted">Member since <?php echo date('M Y', strtotime($member['created_at'])); ?></small>
                                        </div>
                                    </div>
                                    <p class="card-text"><?php echo htmlspecialchars($member['bio'] ?: 'No bio available.'); ?></p>
                                    <a href="profile.php?id=<?php echo $member['id']; ?>" class="btn btn-outline-primary btn-sm">View Profile</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>