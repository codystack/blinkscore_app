<?php
include "./components/header.php";
include "./components/top_navbar.php";
?>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="main-content col-lg-12">
                    <div class="content-area card">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Profile Details</h4>
                            </div>

                            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personal-data">Personal Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#password">Password</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="profile-details">
                                <div class="tab-pane fade show active" id="personal-data">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="full-name" class="input-item-label">First Name</label>
                                                    <input class="input-bordered" type="text" id="full-name" name="full-name" value="<?= $firstName ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="full-name" class="input-item-label">Last Name</label>
                                                    <input class="input-bordered" type="text" id="full-name" name="full-name" value="<?= $lastName ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="email-address" class="input-item-label">Email Address</label>
                                                    <input class="input-bordered" type="text" id="email-address" name="email-address" value="<?= $userEmail ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="mobile-number" class="input-item-label">Mobile Number</label>
                                                    <input class="input-bordered" type="text" id="mobile-number" name="" value="<?= $userPhone ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gaps-1x"></div>
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#profile-update-modal">Update Profile</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="password">
                                    <form id="passwordForm">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="old-pass" class="input-item-label">Old Password</label>
                                                    <input class="input-bordered" type="password" id="old-pass" name="old_pass" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="new-pass" class="input-item-label">New Password</label>
                                                    <input class="input-bordered" type="password" id="new-pass" name="new_pass" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="confirm-pass" class="input-item-label">Confirm New Password</label>
                                                    <input class="input-bordered" type="password" id="confirm-pass" name="confirm_pass" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="note note-plane note-info pdb-1x">
                                            <em class="fas fa-info-circle"></em>
                                            <p>Password should be minimum 8 characters, and include lowercase and uppercase letters.</p>
                                        </div>

                                        <div class="gaps-1x"></div>
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php 
include "./modals/profile_update_modal.php";
include "./components/footer.php";
?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const updateBtn = document.querySelector("#password button.btn.btn-primary");

            updateBtn.addEventListener("click", async (e) => {
                e.preventDefault();

                const oldPass = document.getElementById("old-pass").value.trim();
                const newPass = document.getElementById("new-pass").value.trim();
                const confirmPass = document.getElementById("confirm-pass").value.trim();

                if (!oldPass || !newPass || !confirmPass) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Please fill all fields.",
                        timer: 3000,
                        showConfirmButton: false
                    });
                    return;
                }

                const formData = new FormData();
                formData.append("old_pass", oldPass);
                formData.append("new_pass", newPass);
                formData.append("confirm_pass", confirmPass);

                updateBtn.disabled = true;
                updateBtn.textContent = "Updating...";

                try {
                    const response = await fetch("./auth/update_password.php", {
                        method: "POST",
                        body: formData
                    });

                    const result = await response.json();

                    if (result.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Password Updated",
                            text: result.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                        document.getElementById("old-pass").value = "";
                        document.getElementById("new-pass").value = "";
                        document.getElementById("confirm-pass").value = "";
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: result.message,
                            timer: 3000,
                            showConfirmButton: false
                        });
                    }
                } catch (err) {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong. Try again later.",
                        timer: 3000,
                        showConfirmButton: false
                    });
                    console.error("Password Update Error:", err);
                } finally {
                    updateBtn.disabled = false;
                    updateBtn.textContent = "Update";
                }
            });
        });
    </script>