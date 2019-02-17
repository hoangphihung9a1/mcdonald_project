<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<html>
<body>
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?=$product['ProducId']?></th>
                    <td><?=$product['ProductName']?></td>
                    <td><?=$product['Quantity']?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>