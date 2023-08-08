<!DOCTYPE html>
<html>

<head>
    <title>Form Pemesanan Nasi Kotak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 110px;
        }

        form {
            margin-top: 20px;
        }

        label,
        input,
        select {
            display: block;
            margin-bottom: 10px;
            width: 100%;
        }

        input[type="submit"] {
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1 style="text-align: center;">Form Pemesanan Nasi Kotak</h1>
        <div class="logo">
            <img src="th.jpg" alt="Logo Nasi Kotak">
        </div>
        <form method="post" action="">
            <label for="branch">Cabang</label>
            <select name="branch" id="branch">
                <option value="Majalengka">Majalengka</option>
                <option value="Bandung">Bandung</option>
                <option value="Jakarta">Jakarta</option>
            </select>
            <label for="name">Nama Pelanggan:</label>
            <input type="text" name="name" id="name">
            <label for="phoneNumber">No. HP:</label>
            <input type="text" name="phoneNumber" id="phoneNumber">
            <label for="quantity">Jumlah Kotak:</label>
            <input type="text" name="quantity" id="quantity">
            <input type="submit" name="submit" value="Pesan">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $branch = $_POST['branch'];
            $name = $_POST['name'];
            $phoneNumber = $_POST['phoneNumber'];
            $quantity = $_POST['quantity'];
            $pricePerItem = 50000;
            $discountPerItem = 50000;
            $minimumQuantityForDiscount = 10;
            $totalPriceBeforeDiscount = $pricePerItem * $quantity;
            $totalDiscount = 0;

            if ($quantity > $minimumQuantityForDiscount) {
                $totalDiscount = $discountPerItem * floor($quantity / $minimumQuantityForDiscount);
            }

            $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;

            echo "<div class='result'>";
            echo "<strong>Cabang:</strong> " . $branch . "<br>";
            echo "<strong>Nama:</strong> " . $name . "<br>";
            echo "<strong>No. HP:</strong> " . $phoneNumber . "<br>";
            echo "<strong>Jumlah Kotak:</strong> " . $quantity . "<br>";
            echo "<strong>Tagihan Awal:</strong> Rp " . number_format($totalPriceBeforeDiscount, 0, ',', '.') . "<br>";

            if ($totalDiscount > 0) {
                echo "<strong>Diskon:</strong> Rp " . number_format($totalDiscount, 0, ',', '.') . "<br>";
            }

            echo "<strong>Tagihan Akhir:</strong> Rp " . number_format($totalPriceAfterDiscount, 0, ',', '.') . "<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>