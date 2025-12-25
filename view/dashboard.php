<?php ob_start(); ?>
<div class="row mb-4">
    <div class="col-md-12">
        <h1>Tableau de Bord</h1>
        <p class="lead">Vue d'ensemble de votre gestion de stock</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Produits</h5>
                        <h2 class="card-text"><?php echo $totalProducts; ?></h2>
                    </div>
                    <i class="fas fa-boxes fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Catégories</h5>
                        <h2 class="card-text"><?php echo $totalCategories; ?></h2>
                    </div>
                    <i class="fas fa-tags fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Fournisseurs</h5>
                        <h2 class="card-text"><?php echo $totalSuppliers; ?></h2>
                    </div>
                    <i class="fas fa-truck fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Produits en Stock Bas</h5>
            </div>
            <div class="card-body">
                <?php if(count($lowStockProducts) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Quantité</th>
                                <th>Stock Min</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($lowStockProducts as $product): ?>
                            <tr class="table-danger">
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo $product['quantity']; ?></td>
                                <td><?php echo $product['min_stock']; ?></td>
                                <td><span class="badge bg-danger">ALERTE</span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p class="text-success">Aucun produit en stock bas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
     <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5>Derniers Mouvements</h5>
            </div>
            <div class="card-body">
                <?php if(count($recentMovements) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Type</th>
                                <th>Quantité</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recentMovements as $movement): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($movement['product_name']); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo $movement['movement_type'] == 'IN' ? 'success' : 'danger'; ?>">
                                        <?php echo $movement['movement_type']; ?>
                                    </span>
                                </td>
                                <td><?php echo $movement['quantity']; ?></td>
                                <td><?php echo date('d/m/Y H:i', strtotime($movement['created_at'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <p>Aucun mouvement récent.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php 
$content = ob_get_clean();
$page_title = "Tableau de Bord";
include 'views/layout.php'; 
?>
    