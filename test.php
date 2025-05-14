<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles/css/styles.css">
</head>
<body>
<div class="app-container">
    <?php include 'styles/pages/sidemenu.php'; ?>
    <?php include 'styles/pages/navbare.php'; ?>
        <div class="main-content">
            <div class="page-header">
                <div>
                    <h2 class="page-title">Welcome back, Admin</h2>
                    <p class="page-description">Here's what's happening with your products today.</p>
                </div>
            </div>

            <div class="stats-grid">
                <div class="stat-card primary">
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <div class="value">1,248</div>
                    <div class="label">Total Products</div>
                </div>
                <div class="stat-card success">
                    <div class="icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="value">3,452</div>
                    <div class="label">Today's Views</div>
                </div>
                <div class="stat-card warning">
                    <div class="icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="value">24</div>
                    <div class="label">Pending Updates</div>
                </div>
                <div class="stat-card danger">
                    <div class="icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="value">5</div>
                    <div class="label">Issues Reported</div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Activity</h3>
                </div>
                <p>Your recent product management activities will appear here.</p>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div style="display: flex; gap: 15px;">
                    <button style="padding: 10px 15px; background: var(--primary); color: white; border: none; border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-plus"></i> Add Product
                    </button>
                    <button style="padding: 10px 15px; background: white; color: var(--primary); border: 1px solid var(--primary); border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-upload"></i> Bulk Import
                    </button>
                    <button style="padding: 10px 15px; background: white; color: var(--dark); border: 1px solid var(--gray); border-radius: 6px; cursor: pointer;">
                        <i class="fas fa-cog"></i> Settings
                    </button>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    // Simple script to handle menu active states
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                menuItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Mobile menu toggle would go here
    });
</script>
</body>
</html>