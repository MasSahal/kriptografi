<?php
error_reporting(0);
include("menu.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Encrypt</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/enkripsi.css">
</head>

<body>
    <?php include 'chipper.php'; ?>
    <br>
    <div class="form">
        <form method="POST">
            <textarea id="pesan" style="resize:none;width:198px;height:100px;" type="text" class="input" name="plain" placeholder="Input text" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')">
                <?= $_GET['decrypt']; ?>
            </textarea>
            <input title="Pilih Key" type="number" name="metode" placeholder="Input key" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" value="<?= $_GET['key']; ?>">
            <button type="submit" name="enkripsi">Encrypt</button>
        </form>
    </div>
    <br>

    <!-- Hasil Output ditampilkans saat sudah di enkripsi -->
    <?php if (isset($_POST['enkripsi'])) { ?>

        <?php
        // bikin variable
        $result = Encipher($_POST['plain'], $_POST['metode']);
        $plain  = Decipher(Encipher($_POST['plain'], $_POST['metode']), $_POST['metode']);
        $key    = $_POST['metode'];; ?>
        <h1>
            <center>
                <b>Encrypt Result</b>
            </center>
        </h1>
        <table align="center">
            <tr>
                <th>Ciphertext</th>
                <th>Plaintext</th>
                <th>Key</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>
                    <?= $result; ?>
                </td>
                <td>
                    <?= $plain ?></td>
                <td>
                    <?= $key; ?>
                </td>
                <td>
                    <a href="dekripsi.php?encrypt=<?= $result ?>&&key=<?= $key; ?>" class="btn">Decrypt</a>
                </td>
            </tr>
        </table>

    <?php } ?>
    <!-- penutup tag di line 27 -->

</body>

</html>

<?php
//proses enkripsi

// session_start();

// if (isset($_POST['enkripsi'])) {
//     $_SESSION['dataEncrypt']['name']    = Encipher($_POST['plain'], $_POST['metode']);
//     $_SESSION['dataEncrypt']['regular'] = Decipher(Encipher($_POST['plain'], $_POST['metode']), $_POST['metode']);
//     $_SESSION['dataEncrypt']['key']     = $_POST['metode'];
// }

// var_dump($_SESSION['dataEncrypt']) 
?>