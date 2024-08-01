<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script src="/assets/js/jquery.min.js"></script>
</head>
<body>
<h1>Product List</h1>
<a href="../../../index.php?action=add">ADD</a>
<form action="../../../index.php?action=massDelete" method="POST" id="massDeleteForm">
    <table>
        <thead>
        <tr>
            <th>Select</th>
            <th>SKU</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Attribute</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><input type="checkbox" class="delete-checkbox" name="ids[]" value="<?php echo htmlspecialchars($product['id']); ?>"></td>
                <td><?php echo htmlspecialchars($product['sku']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td><?php echo htmlspecialchars($product['attribute']); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit">MASS DELETE</button>
</form>

<script>
    $(document).ready(function() {
        $('#massDeleteForm').on('submit', function() {
            return confirm('Are you sure you want to delete the selected products?');
        });
    });
</script>
</body>
</html>
