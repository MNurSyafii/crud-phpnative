<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
            max-width: 1200px;
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

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
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

        /* Button styling */
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        a[type="button"], .btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
            display: inline-block;
            text-align: center;
            min-width: 100px;
        }

        a[type="button"]::before, .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s ease;
        }

        a[type="button"]:hover::before, .btn:hover::before {
            left: 100%;
        }

        a[type="button"]:hover, .btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        /* Success button */
        .btn-success {
            background: rgba(25, 135, 84, 0.3);
            border: 1px solid rgba(25, 135, 84, 0.4);
        }

        .btn-success:hover {
            background: rgba(25, 135, 84, 0.4);
            border: 1px solid rgba(25, 135, 84, 0.5);
        }

        /* Danger button */
        .btn-danger {
            background: rgba(220, 53, 69, 0.3);
            border: 1px solid rgba(220, 53, 69, 0.4);
        }

        .btn-danger:hover {
            background: rgba(220, 53, 69, 0.4);
            border: 1px solid rgba(220, 53, 69, 0.5);
        }

        /* Table styling */
        .table-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: transparent;
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-weight: 600;
            padding: 18px 15px;
            text-align: left;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        td {
            padding: 15px;
            color: rgba(255, 255, 255, 0.9);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.95rem;
        }

        tbody tr {
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.3s ease;
            position: relative;
        }

        tbody tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.06);
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.12);
            transform: scale(1.01);
            z-index: 10;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Action buttons in table */
        td .btn {
            padding: 8px 16px;
            font-size: 0.85rem;
            margin-right: 8px;
            min-width: auto;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 10px;
                border-radius: 15px;
            }

            h1 {
                font-size: 1.8rem;
                margin-bottom: 20px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }

            th, td {
                padding: 12px 10px;
                font-size: 0.85rem;
            }

            td .btn {
                padding: 6px 12px;
                font-size: 0.8rem;
                margin-right: 5px;
                margin-bottom: 5px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
                margin: 5px;
            }

            h1 {
                font-size: 1.5rem;
            }

            th, td {
                padding: 10px 8px;
                font-size: 0.8rem;
            }
        }

        /* Loading animation */
        .table-container {
            opacity: 0;
            animation: tableSlideIn 1s ease-out 0.5s forwards;
        }

        @keyframes tableSlideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar for table */
        .table-container::-webkit-scrollbar {
            height: 8px;
        }

        .table-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        .table-container::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }

        /* Number styling */
        td:first-child {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            width: 60px;
        }

        /* Name column emphasis */
        td:nth-child(2) {
            font-weight: 500;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tabel Siswa</h1>
        
        <div class="action-buttons">
            <a href="tambah.php" type="button">+ Tambah</a>
            <a href="index.php" type="button">← Kembali</a>
        </div>

        <div class="table-container">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
                <tbody>
                    <?php
                    $no = 1;
                    $query = "SELECT table_siswa.*, table_jurusan.nama AS nama_jurusan 
                        FROM table_siswa 
                        JOIN table_jurusan ON table_siswa.jurusan_id = table_jurusan.id";
                    $result = mysqli_query($koneksi, $query);

                    while ($data = mysqli_fetch_assoc($result)){
                        echo "
                        <tr>
                        <td>".$no++."</td>
                        <td>".$data['nama']."</td>
                        <td>".$data['nis']."</td>
                        <td>".$data['kelas']."</td>
                        <td>".$data['jurusan_id']."</td>
                        <td>
                            <a href='edit.php?id=".$data["id"]."' class='btn btn-success'>Edit</a>
                            <a href='hapus.php?id=".$data["id"]."' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus data?')\">Hapus</a>
                        </td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Add interactive enhancements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('a[type="button"], .btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Skip ripple for confirmation dialogs
                    if (this.onclick && this.onclick.toString().includes('confirm')) {
                        return;
                    }
                    
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
                        z-index: 1000;
                    `;
                    
                    button.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });

            // Add CSS for ripple animation
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);

            // Enhanced table row interactions
            const tableRows = document.querySelectorAll('tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
                    this.style.transform = 'scale(1.02) translateY(-2px)';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.boxShadow = 'none';
                    this.style.transform = 'scale(1) translateY(0)';
                });
            });

            // Animate table rows on load
            setTimeout(() => {
                tableRows.forEach((row, index) => {
                    row.style.opacity = '0';
                    row.style.transform = 'translateX(-20px)';
                    row.style.transition = 'all 0.5s ease';
                    
                    setTimeout(() => {
                        row.style.opacity = '1';
                        row.style.transform = 'translateX(0)';
                    }, index * 100);
                });
            }, 300);

            // Smooth scroll to top when back button clicked
            const backButton = document.querySelector('a[href="index.php"]');
            if (backButton) {
                backButton.addEventListener('click', function(e) {
                    document.body.style.transform = 'scale(0.95)';
                    document.body.style.opacity = '0.8';
                    document.body.style.transition = 'all 0.3s ease';
                });
            }
        });
    </script>
</body>
</html>