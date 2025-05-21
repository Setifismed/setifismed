<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TaskFlow | Management Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles/dashboard-style-pharmacy.css">
</head>
<body>
<div class="container">
  <!-- Add the sidebar container -->
  <nav class="sidebar">
    <div class="sidebar-header">
      <div class="logo">
        <i class="fas fa-clipboard-list logo-icon"></i>
        <h1>TaskFlow</h1>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-title">Main</li>
      <li>
        <a href="dashboard-pharmacy.html" class="active">
          <i class="fas fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="inventaire-pharmacy.html">
          <i class="fas fa-tasks"></i>
          <span>Inventaire</span>
        </a>
      </li>
      <li>
        <a href="en_attente.html">
          <i class="fas fa-clock"></i>
          <span>En Attente</span>
        </a>
      </li>
      <li>
        <a href="en_cours.html">
          <i class="fas fa-spinner"></i>
          <span>En Cours</span>
        </a>
      </li>
      <li>
        <a href="terminer.html">
          <i class="fas fa-check-circle"></i>
          <span>Terminer</span>
        </a>
      </li>
      <li>
        <a href="annuler.html">
          <i class="fas fa-times-circle"></i>
          <span>Annuler</span>
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Content -->
  <main class="main-content">
    <!-- Rest of your content remains the same -->
    <header>
      <div class="logo">
        <div class="logo-icon">
          <i class="fas fa-tasks"></i>
        </div>
        <h1>Dashboard</h1>
      </div>
      <div class="header-right">
        <div class="datetime-container">
          <div class="datetime" id="currentDateTime">May 19, 2025 14:30:45</div>
          <button class="btn btn-outline" id="refreshBtn">
            <i class="fas fa-sync-alt"></i> Refresh
          </button>
        </div>
        <div class="user-profile">
          <div class="user-avatar">Anis</div>
          <div>
            <div class="user-name">Anis</div>
            <div class="user-role">Zone Name</div>
          </div>
        </div>
      </div>
    </header>

    <div class="status-cards">
      <div class="status-card status-pending">
        <h3><i class="fas fa-clock"></i> En Attente</h3>
        <div class="count">24</div>
      </div>
      <div class="status-card status-inprogress">
        <h3><i class="fas fa-spinner"></i> En Cours</h3>
        <div class="count">12</div>
      </div>
      <div class="status-card status-completed">
        <h3><i class="fas fa-check-circle"></i> Terminer</h3>
        <div class="count">156</div>
      </div>
      <div class="status-card status-cancelled">
        <h3><i class="fas fa-times-circle"></i> Annuler</h3>
        <div class="count">8</div>
      </div>
    </div>

    <div class="input-section">
      <h2><i class="fas fa-barcode"></i> Task Scanner</h2>
      <div class="input-group">
        <div class="input-field">
          <input type="text" id="barcode" placeholder=" " autocomplete="off">
          <label for="barcode">Scan Barcode</label>
        </div>
      </div>
    </div>

    <div class="table-container">
      <table>
        <thead>
        <tr>
          <th>N°</th>
          <th>Date</th>
          <th>Heure Creation</th>
          <th>Heure Début</th>
          <th>Etat</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>1</td>
          <td>19/05/2025</td>
          <td>08:15:23</td>
          <td>08:30:00</td>
          <td><span class="status-badge badge-completed"><i class="fas fa-check-circle"></i> Terminer</span></td>
        </tr>
        <tr>
          <td>2</td>
          <td>19/05/2025</td>
          <td>09:45:12</td>
          <td>10:00:00</td>
          <td><span class="status-badge badge-inprogress"><i class="fas fa-spinner fa-spin"></i> En Cours</span></td>
        </tr>
        <tr>
          <td>3</td>
          <td>19/05/2025</td>
          <td>10:30:45</td>
          <td>-</td>
          <td><span class="status-badge badge-pending"><i class="fas fa-clock"></i> En Attente</span></td>
        </tr>
        <tr>
          <td>4</td>
          <td>18/05/2025</td>
          <td>14:22:10</td>
          <td>-</td>
          <td><span class="status-badge badge-cancelled"><i class="fas fa-times-circle"></i> Annuler</span></td>
        </tr>
        <tr>
          <td>5</td>
          <td>18/05/2025</td>
          <td>16:05:33</td>
          <td>16:15:00</td>
          <td><span class="status-badge badge-completed"><i class="fas fa-check-circle"></i> Terminer</span></td>
        </tr>
        </tbody>
      </table>
    </div>
  </main>
</div>
<script src="scripts/dashboard-preparation.js"></script>
</body>
</html>