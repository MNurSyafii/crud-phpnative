<?php
include "koneksi.php";

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            padding: 20px;
        }

        /* Background decoration */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px;
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: white;
            font-size: 2.2rem;
            font-weight: 300;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(45deg, #ffffff, rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            color: white;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        input, select {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 12px 15px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
        }

        select option {
            background: #764ba2;
            color: white;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: flex-end;
        }

        button, .button {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            min-width: 120px;
            text-align: center;
        }

        button.submit {
            background: rgba(25, 135, 84, 0.3);
            border: 1px solid rgba(25, 135, 84, 0.4);
        }

        button.submit:hover {
            background: rgba(25, 135, 84, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .button:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .container {
                margin: 10px;
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .button-group {
                flex-direction: column;
            }

            button, .button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Guru</h1>
        <form method="POST">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" maxlength="30" minlength="3" name="nama" placeholder="Masukan nama" required>
            </div>

            <div class="form-group">
                <label>NIP</label>
                <input type="number" maxlength="5" name="nip" placeholder="Masukan NIP" required>
            </div>

            <div class="form-group">
                <label>Mapel</label>
                <select name="mapel_id" required>
                    <option value="">--Mapel--</option>    
                    <?php
                    $mapelquery = mysqli_query($koneksi, "SELECT * FROM table_mapel");
                    while ($mapel = mysqli_fetch_assoc($mapelquery)){
                        echo "<option value='" . $mapel['id'] . "'>" . $mapel['nama'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="submit">Tambah</button>
                <a href="tampilGuru.php" class="button">Kembali</a>
            </div>
        </form>
    </div>

    <?php
    $konten = ob_get_clean();
    $judul = "Tambah Guru";

    include "layout.php"
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST["nama"];
        $nip = $_POST["nip"];
        $mapel = $_POST["mapel_id"];

        $query = "INSERT INTO table_guru (nama, nip, mapel_id) VALUES ('$nama', '$nip', '$mapel')";
        $result = mysqli_query($koneksi, $query);

        if($result){
            header("location: tampilGuru.php");
        }else{
            echo "Gagal";
        }
    }
    ?>

    <script>
        // Add ripple effect to buttons
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('button, .button');
            
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = button.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        width: ${size}px;
                        height: ${size}px;
                        left: ${x}px;
                        top: ${y}px;
                        background: rgba(255, 255, 255, 0.3);
                        border-radius: 50%;
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;
                    
                    button.style.position = 'relative';
                    button.style.overflow = 'hidden';
                    button.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });
        });
    </script>
</body>
</html>