<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login - Sistem Pembangunan & Monitoring Proyek</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <!-- Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Open Sans', sans-serif;
      height: 100vh;
      background: linear-gradient(135deg, #004e92, #007bff);
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      color: #333;
    }

    .container {
      display: flex;
      background: rgba(255, 255, 255, 0.98);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 1000px;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Left section */
    .left {
      flex: 1.2;
      background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }

    .left::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.55);
    }

    .left .text {
      position: relative;
      z-index: 2;
      text-align: center;
      padding: 40px;
      max-width: 90%;
    }

    .left h2 {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 30px;
      margin-bottom: 15px;
    }

    .left p {
      font-size: 15px;
      line-height: 1.7;
      opacity: 0.95;
    }

    /* Right section */
    .right {
      flex: 0.9;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #fff;
    }

    .right h2 {
      font-weight: 600;
      font-family: 'Poppins', sans-serif;
      font-size: 26px;
      color: #004e92;
      text-align: center;
      margin-bottom: 8px;
    }

    .right p {
      font-size: 14px;
      text-align: center;
      color: #777;
      margin-bottom: 25px;
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #007bff;
    }

    .form-group input {
      width: 100%;
      padding: 12px 12px 12px 38px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s;
    }

    .form-group input:focus {
      border-color: #007bff;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
      outline: none;
    }

    .remember {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: #555;
      margin-bottom: 20px;
    }

    .remember input {
      margin-right: 8px;
      accent-color: #007bff;
    }

    .btn-login {
      background: linear-gradient(90deg, #007bff, #00a8ff);
      border: none;
      color: white;
      font-weight: 600;
      padding: 12px 0;
      border-radius: 8px;
      width: 100%;
      cursor: pointer;
      font-size: 15px;
      letter-spacing: 0.5px;
      transition: all 0.3s;
    }

    .btn-login:hover {
      background: linear-gradient(90deg, #0069d9, #0096e6);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(0, 123, 255, 0.3);
    }

    .alert {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    @media (max-width: 880px) {
      .container {
        flex-direction: column;
        max-width: 480px;
      }

      .left {
        display: none;
      }

      .right {
        padding: 40px 30px;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Left Section -->
    <div class="left">
      <div class="text">
        <h2>Selamat Datang di Sistem Pembangunan & Monitoring Proyek</h2>
        <p>
          Platform digital terpadu yang mendukung pengelolaan dan pengawasan proyek pembangunan secara profesional, 
          efisien, dan transparan. Sistem ini membantu memastikan setiap tahapan pelaksanaan berjalan tepat waktu, 
          sesuai anggaran, dan terdokumentasi dengan baik.
        </p>
      </div>
    </div>

    <!-- Right Section -->
    <div class="right">
      <h2>Masuk ke Sistem</h2>
      <p>Silakan login menggunakan akun resmi Anda</p>

      @if (session('error'))
        <div class="alert">{{ session('error') }}</div>
      @endif

      <form method="POST" action="{{ route('login.proses') }}">
        @csrf
        <div class="form-group">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Alamat Email" required>
        </div>

        <div class="form-group">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Kata Sandi" required>
        </div>

        <label class="remember">
          <input type="checkbox" name="remember"> Ingat saya
        </label>

        <button type="submit" class="btn-login">Login Sekarang</button>
      </form>
    </div>
  </div>
</body>
</html>
