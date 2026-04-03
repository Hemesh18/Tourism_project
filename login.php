<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ADVENTURE</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./img/carousel-img4.jpg') no-repeat center center/cover; /* Use one of your adventure images */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #111; /* Fallback */
        }

        /* Dark overlay to make the login box pop */
        .overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .login-box {
            position: relative;
            z-index: 2;
            width: 400px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 15px 25px rgba(0,0,0,0.5);
            border-radius: 10px;
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            border: 1px solid rgba(255, 255, 255, 0.2);
            text-align: center;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            letter-spacing: 2px;
            font-size: 32px;
        }

        .user-box {
            position: relative;
            margin-bottom: 30px;
        }

        .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
            box-sizing: border-box;
        }

        /* Dynamic Label Animation */
        .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #ccc;
            pointer-events: none;
            transition: .5s;
        }

        .user-box input:focus ~ label,
        .user-box input:valid ~ label {
            top: -20px;
            left: 0;
            color: #4b8cfb;
            font-size: 12px;
        }

        .submit-btn {
            background: #4b8cfb;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            border-radius: 5px;
            font-family: 'Poppins', sans-serif;
            transition: 0.3s;
        }

        .submit-btn:hover {
            background: #3a75db;
            box-shadow: 0 0 10px #4b8cfb, 0 0 40px #4b8cfb; /* Glow effect */
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">
        <h2>LOGIN</h2>
        <form action="api_login.php" method="POST">
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" class="submit-btn">Sign In</button>
        </form>
</div>
</body>
</html>