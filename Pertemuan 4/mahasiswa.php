<html>

<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    $namaErr = $emailErr = $genderErr = $nimErr = $jurusanErr = "";
    $nama = $email = $gender = $alamat = $jurusan = $nim = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["nim"])) {
            $nimErr = "Nim harus diisi";
        } elseif (!empty($_POST["nim"]) && strlen($_POST["nim"]) != 10) {
            $nimErr = "Nim wajib 10 digit";
        } else {
            $nim = test_input($_POST["nim"]);
        }

        if (empty($_POST["nama"])) {
            $namaErr = "Nama harus diisi";
        } else {
            $nama = test_input($_POST["nama"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi";
        } else {
            $email = test_input($_POST["email"]);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Email tidak sesuai format";
            }
        }

        if (empty($_POST["jurusan"])) {
            $jurusanErr = "Jurusan harus diisi";
        } else {
            $jurusan = test_input($_POST["jurusan"]);
        }

        if (empty($_POST["alamat"])) {
            $alamat = "";
        } else {
            $alamat = test_input($_POST["alamat"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender harus dipilih";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (!empty($nimErr) || !empty($namaErr) || !empty($emailErr) || !empty($genderErr) || !empty($jurusanErr)) {
            $nim = $nama = $email = $gender = $jurusan = $alamat = $website = "";
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>DAFTAR AKUN UNIVERSITAS AHMAD DAHLAN</h2>

    <p><span class="error">* Harus Diisi.</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>NIM:</td>
                <td><input type="number" name="nim">
                    <span class="error">* <?php echo $nimErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Nama Lengkap:</td>
                <td><input type="text" name="nama">
                    <span class="error">* <?php echo $namaErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="email">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Jurusan:</td>
                <td>
                    <select name="jurusan" id="jurusan">
                        <option value="informatika">Teknik Informatika</option>
                        <option value="elektro">Teknik Elektro</option>
                        <option value="industri">Teknik Industri</option>
                    </select>
                    <span class="error">* <?php echo $jurusanErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Alamat:</td>
                <td> <textarea name="alamat" rows="5" cols="40"></textarea></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="Laki-Laki">Laki-Laki
                    <input type="radio" name="gender" value="Perempuan">Perempuan
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </table>
    </form>

    <h2>Data yang anda isi:</h2>
    <table width='80%' border=1>
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>E-Mail</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
        </tr>
        <tr>
            <td><?= $nim; ?></td>
            <td><?= $nama; ?></td>
            <td><?= $email; ?></td>
            <td><?= $jurusan; ?></td>
            <td><?= $alamat; ?></td>
            <td><?= $gender; ?></td>
        </tr>
    </table>

</body>

</html>
