<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
include 'db.php';

// Database connection and query logic here...

// Sample data (replace with your actual database query)
$stats = [
    'total_products' => 1248,
    'in_stock' => 1120,
    'categories' => 42,
    'low_stock' => 128
];

// Zones for filter dropdown
$zones = ['Zone A', 'Zone B', 'Zone C', 'Zone D'];
?>
<div class="card inventory-card">
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="value"><?php echo number_format($stats['total_products']); ?></div>
            <div class="label">Total Products</div>
        </div>
        <div class="stat-card success">
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="value"><?php echo number_format($stats['in_stock']); ?></div>
            <div class="label">In Stock</div>
        </div>
        <div class="stat-card warning">
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <div class="value"><?php echo number_format($stats['categories']); ?></div>
            <div class="label">Categories</div>
        </div>
        <div class="stat-card danger">
            <div class="icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="value"><?php echo number_format($stats['low_stock']); ?></div>
            <div class="label">Low Stock</div>
        </div>
    </div>
    <div class="card-header">
        <div class="header-content">
            <h3 class="card-title">Product Inventory</h3>
            <div class="header-controls">
                <form method="get" class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($searchTerm); ?>">
                </form>
                <div class="filter-controls">
                    <form method="get" class="filter-form">
                        <input type="hidden" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
                        <input type="hidden" name="letter" value="<?php echo htmlspecialchars($letterFilter); ?>">
                        <input type="hidden" name="rows" value="<?php echo $rowsPerPage; ?>">
                        <select name="zone" class="zone-filter" onchange="this.form.submit()">
                            <option value="">Filter by Zone</option>
                            <?php foreach ($zones as $zone): ?>
                            <option value="<?php echo $zone; ?>" <?php echo $zoneFilter === $zone ? 'selected' : ''; ?>>
                                <?php echo $zone; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <select name="letter" class="letter-filter" onchange="this.form.submit()">
                            <option value="">Filter by First Letter</option>
                            <?php foreach (range('A', 'Z') as $letter): ?>
                            <option value="<?php echo $letter; ?>" <?php echo $letterFilter === $letter ? 'selected' : ''; ?>>
                                <?php echo $letter; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="btn btn-secondary btn-sm">
                            <i class="fas fa-download"></i> Export
                        </button>
                        <a href="add_product.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Product
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="modern-table">
                <thead>
                <tr>
                    <th>ID <i class="fas fa-sort"></i></th>
                    <th>Product Name</th>
                    <th>Batch No.</th>
                    <th>Qty <i class="fas fa-sort"></i></th>
                    <th>PPA <i class="fas fa-sort"></i></th>
                    <th>SHP <i class="fas fa-sort"></i></th>
                    <th>Expiration <i class="fas fa-sort"></i></th>
                    <th>Zone</th>
                </tr>
                </thead>
                <tbody>
                <!-- Product rows go here -->
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="table-pagination">
            <div class="pagination-info">
                <span>Showing <span class="current-range"><?php echo "$start-$end"; ?></span> of <span class="total-items"><?php echo number_format($totalRows); ?></span> products</span>
                <div class="rows-per-page">
                    <span>Rows per page:</span>
                    <form method="get" class="rows-form">
                        <input type="hidden" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
                        <input type="hidden" name="zone" value="<?php echo htmlspecialchars($zoneFilter); ?>">
                        <input type="hidden" name="letter" value="<?php echo htmlspecialchars($letterFilter); ?>">
                        <select name="rows" onchange="this.form.submit()">
                            <option value="5" <?php echo ($rowsPerPage == 5 ? 'selected="selected"' : ''); ?>>5</option>
                            <option value="10" <?php echo ($rowsPerPage == 10 ? 'selected="selected"' : ''); ?>>10</option>
                            <option value="25" <?php echo ($rowsPerPage == 25 ? 'selected="selected"' : ''); ?>>25</option>
                            <option value="50" <?php echo ($rowsPerPage == 50 ? 'selected="selected"' : ''); ?>>50</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="pagination-controls">
                <!-- Pagination controls go here -->
            </div>
        </div>
    </div>
</div>

<script src="script.js"></script>
</body>
</html>