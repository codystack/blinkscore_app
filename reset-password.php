<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="www.webify.com.ng">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BlinksCore is a trusted financial company based in Lagos, Nigeria, specializing in providing Proof of Funds and Employment Salary History services. We offer reliable documentation solutions for individuals and businesses to meet financial and compliance requirements.">
    <meta property="og:url" content="https://blinkscore.ng/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="BlinksCore&trade; :: Financial Proof You Can Trust."/>
    <meta name="og:description" content="BlinksCore is a trusted financial company based in Lagos, Nigeria, specializing in providing Proof of Funds and Employment Salary History services. We offer reliable documentation solutions for individuals and businesses to meet financial and compliance requirements.">
    <meta name="keywords" content="Proof of Funds, Employment Salary History, Financial Services, Lagos Nigeria, Proof of Employment, Financial Documentation, Salary Verification, BlinksCore, Nigeria Financial Solutions, Compliance Services">
    
    <link rel="shortcut icon" href="./assets/images/favicon_light.png">

    <title>BlinksCore&trade; :: Reset Password</title>

    <link rel="stylesheet" href="assets/css/vendor.bundle.css">
    <link rel="stylesheet" href="assets/css/style.css" id="layoutstyle">
</head>

<body class="page-ath">
    <div class="page-ath-wrap">
        <div class="page-ath-content">
            <div class="page-ath-header">
                <a href="./" class="page-ath-logo">
                    <img src="./assets/images/logo-dark.svg" srcset="./assets/images/logo-dark.svg 2x" width="200" alt="logo">
                </a>
            </div>
            <div class="page-ath-form">
                <h2 class="page-ath-heading mb-0 pb-0">Reset password</h2>
                <p class="mb-4">Enter your new password below.</p>
                <form id="resetForm">
                    <!-- Hidden input for token from URL -->
                    <input type="hidden" name="token" id="token">

                    <div class="input-item">
                        <input type="password" name="password" placeholder="New Password" required class="input-bordered">
                    </div>
                    <div class="input-item">
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" required class="input-bordered">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </form>

                <div class="gaps-2x"></div>
                    <div class="form-note text-center">
                        <a href="./" class="text-secondary"><strong>Back to Login</strong></a>
                    </div>
                </div>
            <div class="page-ath-footer">
                © <script>document.write(new Date().getFullYear());</script> BlinksCore&trade;. All rights reserved. Built By <a href="https://www.webify.com.ng" target="_blank" class="text-danger">Webify</a>
            </div>
        </div>
        <div class="page-ath-gfx"></div>
    </div>
    
    <script src="assets/js/jquery.bundle.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById("forgotForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const form = e.target;
            const submitBtn = form.querySelector("button[type='submit']");

            // Disable button to prevent multiple clicks
            submitBtn.disabled = true;
            submitBtn.textContent = "Sending...";

            const formData = new FormData(form);

            try {
                const response = await fetch("./auth/forgot_password_auth.php", {
                    method: "POST",
                    body: formData
                });

                // If server did not return JSON
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }

                let result;
                try {
                    result = await response.json();
                } catch (jsonErr) {
                    throw new Error("Invalid JSON response from server");
                }

                if (result.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: result.message,
                        timer: 4000,
                        showConfirmButton: false
                    });
                    form.reset();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: result.message || "Something went wrong."
                    });
                }

            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "Server Error",
                    text: error.message || "Something went wrong. Please try again later."
                });
                console.error("Forgot-password JS Error:", error);
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = "Send Reset Link";
            }
        });
    </script>

</body>

</html>