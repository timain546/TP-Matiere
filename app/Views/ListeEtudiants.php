<?php
/** @var array $etudiants */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SysInfo — Utilisateurs</title>
  <link rel="stylesheet" href="<?= base_url("assets/css/style.css"); ?>" />
</head>

<body>

  <div class="app">

    <!-- ── Sidebar ──────────────────────────────────────────────────────────── -->
    <aside class="sidebar">
      <div class="sidebar-brand">
        <div class="logo-icon">
          <svg viewBox="0 0 24 24" width="18" height="18">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
          </svg>
        </div>
        <div>
          <div class="brand-name">SysInfo</div>
          <div class="brand-sub">v2.4.0</div>
        </div>
      </div>

      <div class="sidebar-section">Navigation</div>

      <a href="<?= base_url('dashboard')?>" class="nav-item">
        <svg viewBox="0 0 24 24">
          <rect width="7" height="9" x="3" y="3" rx="1" />
          <rect width="7" height="5" x="14" y="3" rx="1" />
          <rect width="7" height="9" x="14" y="12" rx="1" />
          <rect width="7" height="5" x="3" y="16" rx="1" />
        </svg>
        Tableau de bord
      </a>
      <a href="<?= base_url('/etudiants')?>" class="nav-item active">
        <svg viewBox="0 0 24 24">
          <line x1="8" y1="6" x2="21" y2="6" />
          <line x1="8" y1="12" x2="21" y2="12" />
          <line x1="8" y1="18" x2="21" y2="18" />
          <line x1="3" y1="6" x2="3.01" y2="6" />
          <line x1="3" y1="12" x2="3.01" y2="12" />
          <line x1="3" y1="18" x2="3.01" y2="18" />
        </svg>
        Utilisateurs
        <span class="nav-badge">24</span>
      </a>
      <a href="form.html" class="nav-item">
        <svg viewBox="0 0 24 24">
          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
        </svg>
        Formulaire
      </a>

      <div class="sidebar-bottom">
        <a href="login.html" class="user-row">
          <div class="avatar">AD</div>
          <div class="user-info">
            <div class="name">Admin Sys</div>
            <div class="role">Super administrateur</div>
          </div>
        </a>
      </div>
    </aside>

    <!-- ── Main ─────────────────────────────────────────────────────────────── -->
    <div class="main">

      <div class="topbar">
        <div class="topbar-title">Gestion des utilisateurs</div>
        <div class="topbar-search">
          <svg viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8" />
            <line x1="21" y1="21" x2="16.65" y2="16.65" />
          </svg>
          <input type="text" placeholder="Rechercher…" />
        </div>
        <div class="topbar-actions">
          <button class="icon-btn">
            <svg viewBox="0 0 24 24">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
            <span class="notif-dot"></span>
          </button>
          <button class="icon-btn">
            <svg viewBox="0 0 24 24">
              <circle cx="12" cy="8" r="4" />
              <path d="M20 21a8 8 0 1 0-16 0" />
            </svg>
          </button>
        </div>
      </div>

      <div class="content">

        <div class="page-header">
          <div>
            <h2>Liste des utilisateurs</h2>
            <div class="breadcrumb">Accueil / <span>Utilisateurs</span></div>
          </div>
          <div style="display:flex;gap:10px">
            <button class="btn btn-secondary btn-sm">
              <svg viewBox="0 0 24 24">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                <polyline points="7 10 12 15 17 10" />
                <line x1="12" y1="15" x2="12" y2="3" />
              </svg>
              Exporter
            </button>
            <a href="form.html" class="btn btn-primary btn-sm">
              <svg viewBox="0 0 24 24">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
              </svg>
              Nouvel utilisateur
            </a>
          </div>
        </div>

        <!-- Toolbar filtres -->
        <div class="toolbar">
          <div class="toolbar-left">
            <div class="search-box">
              <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
              <input type="text" placeholder="Rechercher un utilisateur…" />
            </div>
            <select class="filter-select">
              <option>Tous les rôles</option>
              <option>Administrateur</option>
              <option>Gestionnaire</option>
              <option>Opérateur</option>
              <option>Auditeur</option>
            </select>
            <select class="filter-select">
              <option>Tous les statuts</option>
              <option>Actif</option>
              <option>Inactif</option>
              <option>Suspendu</option>
            </select>
            <select class="filter-select">
              <option>Département</option>
              <option>DSI</option>
              <option>Finance</option>
              <option>RH</option>
              <option>Commercial</option>
            </select>
          </div>
          <button class="btn btn-ghost btn-sm">
            <svg viewBox="0 0 24 24">
              <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            Filtres avancés
          </button>
        </div>

        <!-- Tableau -->
        <div class="table-card">
          <table>
            <thead>
              <tr>
                <th class="td-check"><input type="checkbox" /></th>
                <th class="sortable">Utilisateur ▲</th>
                <th class="sortable">Matricule</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($etudiants as $etudiant) { ?>

                <tr data-href="<?= base_url('dashboard') ?>">
                  <td><input type="checkbox" /></td>
                  <td>
                    <div style="display:flex;align-items:center;gap:10px">
                      <div class="avatar-sm">AR</div>
                      <div>
                        <div style="font-weight:600"><?= esc($etudiant['nom']) ?></div>
                      </div>
                    </div>
                  </td>
                  <td><?= esc($etudiant['id']) ?></td>
                  <td>
                    <div class="td-actions">
                      <button class="action-btn" title="Voir"><svg viewBox="0 0 24 24">
                          <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                          <circle cx="12" cy="12" r="3" />
                        </svg></button>
                      <a href="<?= base_url('etudiants/' . $etudiant['id'] . '/edit') ?>" class="action-btn" title="Modifier"><svg viewBox="0 0 24 24">
                          <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                          <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg></a>
                      <button class="action-btn del" title="Supprimer"><svg viewBox="0 0 24 24">
                          <polyline points="3 6 5 6 21 6" />
                          <path d="M19 6l-1 14H6L5 6" />
                          <path d="M10 11v6M14 11v6" />
                          <path d="M9 6V4h6v2" />
                        </svg></button>
                    </div>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>

          <div class="pagination">
            <span>Affichage de <strong>1–6</strong> sur <strong>284</strong> entrées</span>
            <div class="page-btns">
              <button class="page-btn">‹</button>
              <button class="page-btn active">1</button>
              <button class="page-btn">2</button>
              <button class="page-btn">3</button>
              <button class="page-btn">…</button>
              <button class="page-btn">48</button>
              <button class="page-btn">›</button>
            </div>
          </div>

        </div><!-- /table-card -->

      </div><!-- /content -->
    </div><!-- /main -->
  </div><!-- /app -->

</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function(){
  document.querySelectorAll('tr[data-href]').forEach(function(row){
    row.style.cursor = 'pointer';
    row.addEventListener('click', function(e){
      // ignore clicks on action buttons/links
      if (e.target.closest('a') || e.target.closest('button')) return;
      window.location.href = row.dataset.href;
    });
  });
});
</script>