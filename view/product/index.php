<?php ob_start(); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestion des Produits</h1>
    <a href="index.php?action=create_product" class="btn btn-primary">Ajouter un Produit</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Catégorie</th>
                        <th>Fournisseur</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo htmlspecialchars($product['name']); ?></td>
                        <td><?php echo htmlspecialchars(substr($product['description'], 0, 50)) . '...'; ?></td>
                        <td><?php echo number_format($product['price'], 2); ?> €</td>
                        <td>
                            <span class="badge bg-<?php 
                                echo $product['quantity'] <= $product['min_stock'] ? 'danger' : 
                                    ($product['quantity'] >= $product['max_stock'] ? 'warning' : 'success'); 
                            ?>">
                                <?php echo $product['quantity']; ?>
                            </span>
                        </td>
                        <td><?php echo htmlspecialchars($product['category_name'] ?? 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($product['supplier_name'] ?? 'N/A'); ?></td>
                        <td>
                            <?php 
                            $prod = new Product($db);
                            $prod->quantity = $product['quantity'];
                            $prod->min_stock = $product['min_stock'];
                            $prod->max_stock = $product['max_stock'];
                            echo $prod->checkStockAlert();
                            ?>
                        </td>
                        <td>
                            <a href="index.php?action=edit_product&id=<?php echo $product['id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="index.php?action=delete_product&id=<?php echo $product['id']; ?>" 
                               class="btn btn-sm btn-danger" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$page_title = "Produits";
include 'views/layout.php'; 
?>
