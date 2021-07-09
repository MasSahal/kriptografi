<?php
error_reporting(0);
include("menu.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dekripsi</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/dekripsi.css">
</head>

<body>
    <?php include 'chipper.php'; ?>
    <br>
    <div class="form">
        <form method="POST">
            <textarea id="pesan" style="resize:none;width:198px;height:100px;" type="text" class="input" name="plain" placeholder="Masukkan Ciphertext" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')">
                <?= $_GET['encrypt']; ?>
            </textarea>
            <input title="Pilih Key" type="number" name="metode" placeholder="Masukkan Kunci" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" value="<?= $_GET['key']; ?>">
            <button type="submit" name="dekripsi">Decrypt</button>
        </form>
    </div>
    <br>

    <!-- Hasil Output ditampilkans saat sudah di dekripsi -->
    <?php if (isset($_POST['dekripsi'])) { ?>

        <?php
        $encrypt = Encipher(Decipher($_POST['plain'], $_POST['metode']), $_POST['metode']);
        $result = Decipher($_POST['plain'], $_POST['metode']);
        $key = $_POST['metode'];
        ?>
        <h1>
            <center><b>Decrypt Result</b></center>
        </h1>
        <table align="center">
            <tr>
                <th>Plaintext</th>
                <th>Ciphertext</th>
                <th>Key</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    <?= $result; ?>
                </td>
                <td>
                    <?= $encrypt; ?>
                </td>
                <td>
                    <?= $key; ?>
                </td>
                <td>
                    <a href="enkripsi.php?decrypt=<?= $result ?>&&key=<?= $key; ?>" class="btn">Encrypt</a>
                </td>
            </tr>
        </table>
    <?php }; ?>
</body>

</html>