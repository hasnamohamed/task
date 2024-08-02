<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Product List</h1>
        <a href="/task/index.php?action=add" class="btn btn-primary mb-3">ADD</a>
        <form action="/task/index.php?action=massDelete" method="POST" id="massDeleteForm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>Price ($)</th>
                        <th>Attribute</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>Width</th>
                        <th>Length</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($products) && is_array($products)) : ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><input type="checkbox" class="delete-checkbox form-check-input" name="ids[]" value="<?php echo htmlspecialchars($product['id']); ?>"></td>
                                <td><?php echo htmlspecialchars($product['sku']); ?></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo htmlspecialchars($product['price']) . '$'; ?></td>
                                <td><?php echo htmlspecialchars($product['attribute']); ?></td>
                                <td><?php echo $product['size'] ? htmlspecialchars($product['size']) : '-'; ?></td>
                                <td><?php echo $product['weight'] ? htmlspecialchars($product['weight']) : '-'; ?></td>
                                <td><?php echo $product['height'] ? htmlspecialchars($product['height']) : '-'; ?></td>
                                <td><?php echo $product['width'] ? htmlspecialchars($product['width']) : '-'; ?></td>
                                <td><?php echo $product['length'] ? htmlspecialchars($product['length']) : '-'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10" class="text-center">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <button type="submit" id="delete-product-btn" class="btn btn-danger">MASS DELETE</button>
        </form>
    </div>
    <hr>
    <footer class="footer">
        <div class="container">
            <p class="mb-0">Scandiweb Test assignment</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#massDeleteForm').on('submit', function() {
                return confirm('Are you sure you want to delete the selected products?');
            });
        });
    </script>
</body>

</html>