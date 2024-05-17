<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Thông Tin Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thông Tin Sản Phẩm</h2>
        <form action="submit_form.php" method="post" enctype="multipart/form-data">
            <label for="product-name">Tên Sản Phẩm: </label>
            <input type="text" id="product-name" name="product-name" required value="{{ $product->TenSp }}">

            <label for="price">Giá: </label>
            <input type="number" id="price" name="price" required value="{{ $product->Gia }}">

            <label for="description">Mô Tả:</label>
            <input type="text" id="product-description" name="product-description" required value="{{ $product->MoTa }}">

            <label for="image">Hình Ảnh:</label>
            <img class="img-fluid w-100" src="{{ asset($product->AnhMoTa) }}" alt="{{ $product->TenSp }}">

           

            
        </form>
    </div>
</body>
</html>
