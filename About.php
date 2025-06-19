<?php include "header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Mobilemart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .about-hero {
            max-width: 900px;
            margin: 50px auto 0 auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.12);
            border: 1.5px solid #e3e8ee;
            padding: 48px 36px 36px 36px;
            text-align: center;
        }
        .about-logo {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.10);
            border: 3px solid #e0eafc;
            background: #f4f8fb;
            object-fit: cover;
            margin-bottom: 18px;
        }
        .about-title {
            font-size: 44px;
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 10px;
            position: relative;
        }
        .about-title::after {
            content: '';
            display: block;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            margin: 18px auto 0 auto;
            border-radius: 2px;
        }
        .about-tagline {
            font-size: 22px;
            color: #667eea;
            margin-bottom: 24px;
        }
        .about-mission {
            font-size: 20px;
            background: #f4f4f4;
            padding: 20px 28px;
            margin: 24px 0;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.07);
            display: inline-block;
        }
        .about-values {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin: 36px 0 0 0;
            flex-wrap: wrap;
        }
        .value-card {
            background: #f7fafd;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.07);
            padding: 24px 28px;
            min-width: 220px;
            max-width: 260px;
            text-align: center;
            margin-bottom: 18px;
        }
        .value-card .icon {
            font-size: 32px;
            color: #667eea;
            margin-bottom: 10px;
        }
        .value-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 6px;
        }
        .value-desc {
            font-size: 16px;
            color: #444;
        }
        .team-section {
            max-width: 900px;
            margin: 48px auto 0 auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.12);
            border: 1.5px solid #e3e8ee;
            padding: 36px 36px 32px 36px;
        }
        .team-title {
            font-size: 32px;
            color: #2c3e50;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .team-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            justify-content: center;
        }
        .team-member {
            background: #f7fafd;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.07);
            padding: 22px 18px 18px 18px;
            min-width: 180px;
            max-width: 200px;
            text-align: center;
        }
        .member-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            border: 2px solid #667eea;
        }
        .member-name {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 2px;
        }
        .member-role {
            font-size: 15px;
            color: #667eea;
            margin-bottom: 6px;
        }
        .member-desc {
            font-size: 14px;
            color: #444;
        }
        @media (max-width: 700px) {
            .about-hero, .team-section {
                padding: 18px 4vw;
            }
            .about-title {
                font-size: 30px;
            }
            .team-title {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="about-hero">
        <img src="MM.png" alt="Mobilemart Logo" class="about-logo">
        <div class="about-title">About Mobilemart</div>
        <div class="about-tagline">Your Trusted Partner for Mobile Solutions</div>
        <div class="about-mission">
            <strong>Our Mission:</strong> To make technology accessible and enjoyable for everyone by providing the best mobile products and services in Nepal.
        </div>
    </div>
</body>
</html>
<?php include "footer.php"; ?>