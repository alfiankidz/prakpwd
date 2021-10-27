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
    # Alfian Hakim / 1900018398 / Jumat 16.30

    # Deklarasi variabel dengan nilai kosong.
    # Variabel yang berakhiran Err digunakan untuk menampung peringatan data yang tidak lolos validasi.
    $namaErr = $emailErr = $genderErr = $websiteErr = "";
    $nama = $email = $gender = $comment = $website = "";

    # Mengecek apakah ada metode permintaan yang dikirim ke server bertipe POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # Mengecek apakah field input dengan name="nama" yang dikirim kosong atau tidak.
        if (empty($_POST["nama"])) {
            # Jika kosong maka variabel Err(peringatan validasi) akan diisi untuk memperingatkan user.
            $namaErr = "Nama harus diisi";
        } else {
            # Jika tidak kosong maka nilai yang dikirim akan disimpan pada variabel nama.
            # Sebelumnya nilai akan divalidasi untuk mencegah cross-scripting dengan fungsi yang telah dibuat yaitu test_input.
            $nama = test_input($_POST["nama"]);
        }

        # Mengecek apakah field input dengan name="email" yang dikirim kosong atau tidak.
        if (empty($_POST["email"])) {
            # Jika kosong maka variabel Err(peringatan validasi) akan diisi untuk memperingatkan user.
            $emailErr = "Email harus diisi";
        } else {
            # Jika tidak kosong maka nilai yang dikirim akan disimpan pada variabel email.
            # Sebelumnya nilai akan divalidasi untuk mencegah cross-scripting dengan fungsi yang telah dibuat yaitu test_input.
            $email = test_input($_POST["email"]);

            # Memvalidasi apakah email dalam format yang benar.
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                # Jika email tidak dalam format yang benar maka akan muncul peringatan.
                $emailErr = "Email tidak sesuai format";
            }
        }

        # Mengecek apakah field input dengan name="website" yang dikirim kosong atau tidak.
        if (empty($_POST["website"])) {
            # Jika kosong maka variabel website akan diisi kosong, karena bukan field yang wajib diisi.
            $website = "";
        } else {
            # Jika tidak kosong maka nilai yang dikirim akan disimpan pada variabel website.
            # Sebelumnya nilai akan divalidasi untuk mencegah cross-scripting dengan fungsi yang telah dibuat yaitu test_input.
            $website = test_input($_POST["website"]);
        }

        # Mengecek apakah field input dengan name="comment" yang dikirim kosong atau tidak.
        if (empty($_POST["comment"])) {
            # Jika kosong maka variabel comment akan diisi kosong, karena bukan field yang wajib diisi.
            $comment = "";
        } else {
            # Jika tidak kosong maka nilai yang dikirim akan disimpan pada variabel comment.
            # Sebelumnya nilai akan divalidasi untuk mencegah cross-scripting dengan fungsi yang telah dibuat yaitu test_input.
            $comment = test_input($_POST["comment"]);
        }

        # Mengecek apakah field input dengan name="gender" yang dikirim kosong atau tidak.
        if (empty($_POST["gender"])) {
            # Jika kosong maka variabel Err(peringatan validasi) akan diisi untuk memperingatkan user.
            $genderErr = "Gender harus dipilih";
        } else {
            # Jika tidak kosong maka nilai yang dikirim akan disimpan pada variabel gender.
            # Sebelumnya nilai akan divalidasi untuk mencegah cross-scripting dengan fungsi yang telah dibuat yaitu test_input.
            $gender = test_input($_POST["gender"]);
        }

        # Digunakan untuk mengecek apakah ada field input yang wajib diisi masih kosong.
        if (!empty($namaErr) || !empty($emailErr) || !empty($genderErr) || !empty($websiteErr)) {
            # Jika ada field input yang wajib diisi masih kosong maka variabel nama, email, gender, comment, website akan kosong.
            $nama = $email = $gender = $comment = $website = "";
        }
    }

    # Fungsi untuk mencegah input cross-scripting.
    function test_input($data)
    {
        # Menghapus spasi/whitespace pada awal dan akhir value.
        $data = trim($data);
        # Menghapus backslashes '\' pada value.
        $data = stripslashes($data);
        # Mengkonversi karakter HTML agar tidak diproses, 4 karakter itu yaitu <,>,&,"
        $data = htmlspecialchars($data);
        # Mengembalikan data yang sudah divalidasi.
        return $data;
    }
    ?>
    <h2>Posting Komentar </h2>

    <p><span class="error">* Harus Diisi.</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama">
                    # Variabel untuk menampilkan peringatan jika nama kosong.
                    <span class="error">* <?php echo $namaErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>E-mail: </td>
                <td><input type="text" name="email">
                    # Variabel untuk menampilkan peringatan jika email kosong / tidak sesuai format.
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>

            <tr>
                <td>Website:</td>
                <td> <input type="text" name="website"></td>
            </tr>

            <tr>
                <td>Komentar:</td>
                <td> <textarea name="comment" rows="5" cols="40"></textarea></td>
            </tr>

            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="gender" value="L">Laki-Laki
                    <input type="radio" name="gender" value="P">Perempuan
                    # Variabel untuk menampilkan peringatan jika gender kosong.
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
            <th>Nama</th>
            <th>Email</th>
            <th>Website</th>
            <th>Komentar</th>
            <th>Jenis Kelamin</th>
        </tr>
        <tr>
            # Menampilkan data pada variabel nama.
            <td><?= $nama; ?></td>
            # Menampilkan data pada variabel email.
            <td><?= $email; ?></td>
            # Menampilkan data pada variabel website.
            <td><?= $website; ?></td>
            # Menampilkan data pada variabel comment.
            <td><?= $comment; ?></td>
            # Menampilkan data pada variabel gender.
            <td><?= $gender; ?></td>
        </tr>
    </table>

</body>

</html>
