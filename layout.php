<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? "Data Sekolah" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
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

        /* Container styling */
        .container {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(20px);
            border-radius: 20px !important;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 
                0 8px 32px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
            margin-top: 2rem !important;
            padding: 2rem !important;
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

        /* Typography */
        h1 {
            color: white !important;
            font-weight: 300 !important;
            letter-spacing: 1px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background: linear-gradient(45deg, #ffffff, rgba(255, 255, 255, 0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 2rem !important;
        }

        h2, h3, h4, h5, h6 {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 400 !important;
        }

        p, span, div {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        /* Bootstrap Table Override */
        .table {
            background: rgba(255, 255, 255, 0.05) !important;
            backdrop-filter: blur(10px);
            border-radius: 15px !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            font-weight: 500 !important;
            border: none !important;
            padding: 1rem !important;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table td {
            background: rgba(255, 255, 255, 0.05) !important;
            color: rgba(255, 255, 255, 0.9) !important;
            border: none !important;
            padding: 1rem !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }

        .table tbody tr:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        /* Bootstrap Button Override */
        .btn {
            backdrop-filter: blur(10px);
            border-radius: 12px !important;
            font-weight: 500 !important;
            padding: 12px 24px !important;
            transition: all 0.3s ease !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: rgba(255, 255, 255, 0.2) !important;
            color: white !important;
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.3) !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2) !important;
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
        }

        .btn-secondary {
            background: rgba(108, 117, 125, 0.2) !important;
            color: rgba(255, 255, 255, 0.9) !important;
        }

        .btn-secondary:hover {
            background: rgba(108, 117, 125, 0.3) !important;
            transform: translateY(-2px);
        }

        .btn-success {
            background: rgba(25, 135, 84, 0.2) !important;
            color: white !important;
        }

        .btn-success:hover {
            background: rgba(25, 135, 84, 0.3) !important;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: rgba(220, 53, 69, 0.2) !important;
            color: white !important;
        }

        .btn-danger:hover {
            background: rgba(220, 53, 69, 0.3) !important;
            transform: translateY(-2px);
        }

        .btn-warning {
            background: rgba(255, 193, 7, 0.2) !important;
            color: white !important;
        }

        .btn-warning:hover {
            background: rgba(255, 193, 7, 0.3) !important;
            transform: translateY(-2px);
        }

        /* Bootstrap Form Override */
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.1) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 12px !important;
            color: white !important;
            backdrop-filter: blur(10px);
            padding: 12px 16px !important;
            transition: all 0.3s ease !important;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.15) !important;
            border: 1px solid rgba(255, 255, 255, 0.4) !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5) !important;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500 !important;
            margin-bottom: 8px !important;
        }

        /* Bootstrap Card Override */
        .card {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 15px !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.1) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: white !important;
        }

        .card-body {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        /* Bootstrap Alert Override */
        .alert {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            border-radius: 12px !important;
            color: white !important;
        }

        .alert-success {
            background: rgba(25, 135, 84, 0.2) !important;
            border: 1px solid rgba(25, 135, 84, 0.3) !important;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.2) !important;
            border: 1px solid rgba(220, 53, 69, 0.3) !important;
        }

        .alert-warning {
            background: rgba(255, 193, 7, 0.2) !important;
            border: 1px solid rgba(255, 193, 7, 0.3) !important;
        }

        .alert-info {
            background: rgba(13, 202, 240, 0.2) !important;
            border: 1px solid rgba(13, 202, 240, 0.3) !important;
        }

        /* Bootstrap Badge Override */
        .badge {
            background: rgba(255, 255, 255, 0.2) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 8px 12px !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                margin: 1rem !important;
                padding: 1.5rem !important;
                border-radius: 15px !important;
            }

            h1 {
                font-size: 1.5rem !important;
            }

            .table {
                font-size: 0.9rem;
            }

            .btn {
                padding: 10px 20px !important;
                font-size: 0.9rem !important;
            }
        }

        /* Loading animation */
        .container {
            opacity: 0;
            animation: containerFadeIn 1s ease-out 0.2s forwards;
        }

        @keyframes containerFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1><?= $judul ?? "Data Sekolah" ?></h1>
        <?=$konten ?? "" ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Add interactive enhancements
        document.addEventListener('DOMContentLoaded', function() {
            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn');
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
                .btn {
                    position: relative;
                    overflow: hidden;
                }
            `;
            document.head.appendChild(style);

            // Smooth hover effects for table rows
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.01)';
                    this.style.zIndex = '10';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.zIndex = '1';
                });
            });

            // Add focus enhancement for form controls
            const formControls = document.querySelectorAll('.form-control, .form-select');
            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });
                
                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>