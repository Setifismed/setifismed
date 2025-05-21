<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartPrep - Gestion des bons</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="styles/inventaire-style_pharmacy.css">
</head>
<body>
<nav class="sidebar">
  <div class="sidebar-header">
    <div class="logo">
      <i class="fas fa-clipboard-list logo-icon"></i>
      <h1>SmartPrep</h1>
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

<div class="container">
  <header>
    <div class="logo">
      <i class="fas fa-clipboard-list"></i>
      <h1>SmartPrep</h1>
    </div>
    <div class="user-profile">
      <div class="user-avatar">JD</div>
      <div>
        <div style="font-weight: 600;">Jean Dupont</div>
        <div style="font-size: 14px; color: var(--gray);">Entrepôt Principal</div>
      </div>
    </div>
  </header>

  <div class="barcode-section">
    <div class="barcode-container">
      <i class="fas fa-barcode barcode-icon"></i>
      <input type="text" class="barcode-input" placeholder="Scanner code-barres..." autofocus>
    </div>

    <div class="action-buttons">
      <button class="btn btn-accent">
        <i class="fas fa-exclamation-circle"></i>
        Réclamation
      </button>
      <button class="btn btn-primary">
        <i class="fas fa-clipboard-check"></i>
        Inventaire
      </button>
    </div>
  </div>

  <!-- Added search bar section -->
  <div class="search-container">
    <div class="search-box">
      <i class="fas fa-search search-icon"></i>
      <input type="text" class="search-input" placeholder="Rechercher un produit...">
    </div>
    <div class="table-actions">
      <button class="filter-btn">
        <i class="fas fa-filter"></i>
        <span>Filtrer</span>
      </button>
      <button class="filter-btn">
        <i class="fas fa-download"></i>
        <span>Exporter</span>
      </button>
    </div>
  </div>

  <table class="data-table">
    <thead>
    <tr>
      <th>Produit</th>
      <th>Lot</th>
      <th>Date</th>
      <th>Quantité</th>
      <th>Zone</th>
      <th>Expiration</th>
      <th>PPA</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>
        <div style="display: flex; align-items: center; gap: 12px;">
          <div style="width: 40px; height: 40px; background: #e2e8ff; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-pills" style="color: var(--primary);"></i>
          </div>
          <div>
            <div style="font-weight: 600;">Paracétamol 500mg</div>
            <div style="font-size: 14px; color: var(--gray);">REF: MED-25487</div>
          </div>
        </div>
      </td>
      <td>LOT-2023-045</td>
      <td>15/06/23</td>
      <td><strong>120</strong> unités</td>
      <td>Zone A</td>
      <td><span class="badge badge-success">12/2024</span></td>
      <td>5.20€</td>
    </tr>
    <tr>
      <td>
        <div style="display: flex; align-items: center; gap: 12px;">
          <div style="width: 40px; height: 40px; background: #ffe2e2; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-capsules" style="color: var(--accent);"></i>
          </div>
          <div>
            <div style="font-weight: 600;">Ibuprofène 200mg</div>
            <div style="font-size: 14px; color: var(--gray);">REF: MED-30112</div>
          </div>
        </div>
      </td>
      <td>LOT-2023-112</td>
      <td>22/07/23</td>
      <td><strong>85</strong> unités</td>
      <td>Zone B</td>
      <td><span class="badge badge-success">03/2025</span></td>
      <td>3.75€</td>
    </tr>
    <tr>
      <td>
        <div style="display: flex; align-items: center; gap: 12px;">
          <div style="width: 40px; height: 40px; background: #e2ffe5; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
            <i class="fas fa-syringe" style="color: #4cc9f0;"></i>
          </div>
          <div>
            <div style="font-weight: 600;">Amoxicilline 1g</div>
            <div style="font-size: 14px; color: var(--gray);">REF: MED-15987</div>
          </div>
        </div>
      </td>
      <td>LOT-2022-987</td>
      <td>10/11/22</td>
      <td><strong>42</strong> unités</td>
      <td>Zone C</td>
      <td><span class="badge badge-danger">05/2023</span></td>
      <td>8.90€</td>
    </tr>
    </tbody>
  </table>
</div>
<script src="scripts/inventaire.js"></script>
</body>
</html>