<?php
/** @var array $notes */
/** @var array $matieres */
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SysInfo — Notes</title>
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
      <a href="<?= base_url('/notes')?>" class="nav-item active">
        <svg viewBox="0 0 24 24">
          <line x1="8" y1="6" x2="21" y2="6" />
          <line x1="8" y1="12" x2="21" y2="12" />
          <line x1="8" y1="18" x2="21" y2="18" />
          <line x1="3" y1="6" x2="3.01" y2="6" />
          <line x1="3" y1="12" x2="3.01" y2="12" />
          <line x1="3" y1="18" x2="3.01" y2="18" />
        </svg>
        Notes
        <span class="nav-badge"><?= count($notes) ?></span>
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
        <div class="topbar-title">Gestion des notes</div>
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
            <h2>Liste des notes</h2>
            <div class="breadcrumb">Accueil / <span>Notes</span></div>
          </div>
        </div>

        <!-- Form for adding note -->
        <div class="form-card" style="margin-bottom: 20px;">
          <form action="<?= base_url('notes/add') ?>" method="post" style="display: flex; gap: 10px; align-items: center;">
            <label for="matiere">Matière:</label>
            <select name="code_matiere" id="matiere" required>
              <option value="">Sélectionner une matière</option>
              <?php foreach ($matieres as $matiere) { ?>
                <option value="<?= esc($matiere['code_matiere']) ?>"><?= esc($matiere['nom']) ?></option>
              <?php } ?>
            </select>
            <label for="note">Note:</label>
            <input type="number" name="note" id="note" min="0" max="20" step="0.01" required>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </form>
        </div>

        <!-- Toolbar filtres -->
        <div class="toolbar">
          <div class="toolbar-left">
            <div class="search-box">
              <svg viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
              </svg>
              <input type="text" placeholder="Rechercher une note…" />
            </div>
            <select class="filter-select">
              <option>Toutes les matières</option>
              <?php foreach ($matieres as $matiere) { ?>
                <option><?= esc($matiere['nom']) ?></option>
              <?php } ?>
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
                <th class="sortable">Étudiant ▲</th>
                <th class="sortable">Matière</th>
                <th class="sortable">Note</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach ($notes as $note) { ?>

                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div style="display:flex;align-items:center;gap:10px">
                      <div class="avatar-sm">AR</div>
                      <div>
                        <div style="font-weight:600"><?= esc($note['id_etudiant']) ?></div>
                      </div>
                    </div>
                  </td>
                  <td><?= esc($note['code_matiere']) ?> - <?= model('MatiereModel')->find($note['code_matiere'])['nom'] ?></td>
                  <td><?= esc($note['note']) ?></td>
                  <td>
                    <div class="td-actions">
                      <a href="<?= base_url('notes/' . $note['id'] . '/delete') ?>" class="action-btn del" title="Supprimer"><svg viewBox="0 0 24 24">
                          <polyline points="3 6 5 6 21 6" />
                          <path d="M19 6l-1 14H6L5 6" />
                          <path d="M10 11v6M14 11v6" />
                          <path d="M9 6V4h6v2" />
                        </svg></a>
                    </div>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>

          <div class="pagination">
            <span>Affichage de <strong>1–<?= count($notes) ?></strong> sur <strong><?= count($notes) ?></strong> entrées</span>
            <div class="page-btns">
              <button class="page-btn">‹</button>
              <button class="page-btn active">1</button>
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
