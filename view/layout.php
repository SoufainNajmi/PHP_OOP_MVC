<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock - <?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gestion de Stock</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=dashboard">Tableau de bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=products">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=categories">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=suppliers">Fournisseurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=movements">Mouvements</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-<?php echo $_GET['message'] == 'error' ? 'danger' : 'success'; ?> alert-dismissible fade show">
                <?php
                switch($_GET['message']) {
                    case 'created':
                        echo "Enregistrement créé avec succès!";
                        break;
                    case 'updated':
                        echo "Enregistrement mis à jour avec succès!";
                        break;
                    case 'deleted':
                        echo "Enregistrement supprimé avec succès!";
                        break;
                    case 'error':
                        echo "Une erreur est survenue!";
                        break;
                }
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php echo $content; ?>
    </div>
    
</body>
</html>