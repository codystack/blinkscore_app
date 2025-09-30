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

    <title>BlinksCore&trade; :: Forgot Password</title>

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
                <h2 class="page-ath-heading">Forgot password <span>If you forgot your password, well, then we’ll email you instructions to reset your password.</span></h2>
                <form id="forgotForm">
                    <div class="input-item">
                        <input type="email" name="email" placeholder="Email Address" required class="input-bordered">
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
                        </div>
                        <div>
                            <a href="./" class="text-secondary">Return to login</a>
                        </div>
                    </div>
                    <div class="gaps-2x"></div>
                </form>
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

            // Disable button
            submitBtn.disabled = true;
            submitBtn.textContent = "Sending...";

            const formData = new FormData(form);

            try {
                const response = await fetch("./auth/forgot_password_auth.php", {
                    method: "POST",
                    body: formData
                });

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}`);
                }

                let result;
                try {
                    // Try JSON
                    result = await response.json();
                } catch (jsonErr) {
                    // If not JSON, get raw text for debugging
                    const text = await response.text();
                    console.error("Server returned non-JSON:", text);
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
                submitBtn.disabled = false;
                submitBtn.textContent = "Send Reset Link";
            }
        });
    </script>


</body>

</html>