<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../../assets/js/product-attribute.js" defer></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Add Product</h1>
        <form id="product-form" action="../../../index.php?action=store" method="POST">
            <div class="mb-3">
                <label for="sku" class="form-label">SKU:</label>
                <input type="text" id="sku" name="sku" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="productType" class="form-label">Product Type:</label>
                <select id="productType" name="attribute" class="form-select" required>
                    <option value="">Select product type</option>
                    <option class="size" id="DVD" value="dvd">DVD-disc</option>
                    <option class="weight" id="Book" value="book">Book</option>
                    <option class="dimensions in HxWxL" id="Furniture" value="furniture">Furniture</option>
                </select>
                <span id="description" ></span>
            </div>
            <!-- DVD-disc specific field -->
            <div id="dvd-fields" class="dynamic-field mb-3">
                <label for="size" class="form-label">Size (in MB):</label>
                <input type="number" id="size" name="size" class="dvd form-control" step="0.01">
            </div>

            <!-- Book specific field -->
            <div id="book-fields" class="dynamic-field mb-3">
                <label for="weight" class="form-label">Weight (in Kg):</label>
                <input type="number" id="weight" name="weight" class="book form-control" step="0.01">
            </div>

            <!-- Furniture specific fields -->
            <div id="furniture-fields" class="dynamic-field mb-3">
                <label for="height" class="form-label">Height (in cm):</label>
                <input type="number" id="height" name="height" class="furniture form-control" step="0.01">
                <label for="width" class="form-label">Width (in cm):</label>
                <input type="number" id="width" name="width" class="furniture form-control" step="0.01">
                <label for="length" class="form-label">Length (in cm):</label>
                <input type="number" id="length" name="length" class="furniture form-control" step="0.01">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <hr>
    <footer class="footer">
        <div class="container ">
            <p class="mb-0">Scandiweb Test assignment</p>
        </div>
    </footer>
</body>
</html>