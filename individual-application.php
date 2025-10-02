<?php
include "./components/header.php";
include "./components/top_navbar.php";
?>

    <div class="page-header page-header-kyc">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7 text-center">
                    <h2 class="page-title">Individual Proof of Fund Application</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="main-content col-lg-10 col-xl-9">
                    <div class="content-area card">
                        <div class="card-innr">
                            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#personal-details">Personal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#nok">Next of Kin Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#pof">Proof of Fund Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#documents">Documents Upload</a>
                                </li>
                            </ul>
                            
                            <div class="tab-content" id="personal-details">
                                <div class="tab-pane fade show active" id="personal-details">
                                    <div class="kyc-form-steps card mx-lg-4 mb-0">
                                        <div class="form-step form-step1">
                                            <div class="form-step-head card-innr">
                                                <div class="step-head">
                                                    <div class="step-number">01</div>
                                                    <div class="step-head-text">
                                                        <h4>Personal Details</h4>
                                                        <p>Your simple personal information required for identification</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-step-fields card-innr">
                                                <form id="personalApplicationForm" method="POST" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">First Name <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text" value="<?= $firstName ?>" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Last Name <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text" value="<?= $lastName ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Other Names</label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Mother’s Maiden Name <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Email Address <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text" value="<?= $userEmail ?>" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Phone Number <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text" value="<?= $userPhone ?>" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Date of Birth <span class="text-danger">*</span></label>
                                                                <input class="input-bordered date-picker" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Place of Birth <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="gender" class="input-item-label">Gender <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="gender" id="gender">
                                                                    <option selected disabled value="">Select Gender</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="nationality" class="input-item-label">Nationality <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="nationality" id="nationality">
                                                                    <option selected disabled value="">Select Nationality</option>
                                                                    <option>Nigeria</option>
                                                                    <option>United Kingdom</option>
                                                                    <option>United States</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">State of Origin <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">LGA <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Hometown <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="marital-status" class="input-item-label">Marital Status <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="marital-status" id="marital-status">
                                                                    <option selected disabled value="">Select Marital Status</option>
                                                                    <option>Single</option>
                                                                    <option>Married</option>
                                                                    <option>Divorced</option>
                                                                    <option>Widowed</option>
                                                                    <option>Separated</option>
                                                                    <option>Prefer Not to Say</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="religion" class="input-item-label">Religion <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="religion" id="religion">
                                                                    <option selected disabled value="">Select Religion</option>
                                                                    <option>Christianity</option>
                                                                    <option>Islam</option>
                                                                    <option>Hinduism</option>
                                                                    <option>Buddhism</option>
                                                                    <option>Judaism</option>
                                                                    <option>Traditional / Indigenous Beliefs</option>
                                                                    <option>Atheist</option>
                                                                    <option>Prefer Not to Say</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Occupation <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Workplace & Workplace Address <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gaps-1x"></div>
                                                    <div class="d-sm-flex justify-content-between align-items-center">
                                                        <a href="individual-application" class="btn btn-primary btn-between">
                                                            Submit <em class="ti ti-save"></em>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="nok">
                                    <div class="kyc-form-steps card mx-lg-4 mb-0">
                                        <div class="form-step form-step2">
                                            <div class="form-step-head card-innr">
                                                <div class="step-head">
                                                    <div class="step-number">02</div>
                                                    <div class="step-head-text">
                                                        <h4>Next of Kin Details</h4>
                                                        <p>The biodata of your next of kin</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-step-fields card-innr">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin First Name <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin Last Name <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin Email Address <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin Phone Number <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin Date of Birth <span class="text-danger">*</span></label>
                                                                <input class="input-bordered date-picker" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="gender" class="input-item-label">Next Of Kin Gender <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="gender" id="gender">
                                                                    <option selected disabled value="">Select Gender</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Next Of Kin Residential Address <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="relationship" class="input-item-label">Relationship With Next Of Kin <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="relationship" id="relationship">
                                                                    <option selected disabled value="">Select Relationship</option>
                                                                    <option>Spouse</option>
                                                                    <option>Parent</option>
                                                                    <option>Child</option>
                                                                    <option>Sibling</option>
                                                                    <option>Aunt</option>
                                                                    <option>Uncle</option>
                                                                    <option>Cousin</option>
                                                                    <option>Niece</option>
                                                                    <option>Nephew</option>
                                                                    <option>Legal Guardian</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gaps-1x"></div>
                                                    <div class="d-sm-flex justify-content-between align-items-center">
                                                        <a href="individual-application" class="btn btn-primary btn-between">
                                                            Submit <em class="ti ti-save"></em>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="pof">
                                    <div class="kyc-form-steps card mx-lg-4 mb-0">
                                        <div class="form-step form-step3">
                                            <div class="form-step-head card-innr">
                                                <div class="step-head">
                                                    <div class="step-number">03</div>
                                                    <div class="step-head-text">
                                                        <h4>Proof of Fund Details</h4>
                                                        <p>Informations about your proof of funds</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-step-fields card-innr">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Loan Amount <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="number">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="bank-type" class="input-item-label">Bank Type <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="bank-type" id="bank-type">
                                                                    <option selected disabled value="">Select Bank Type</option>
                                                                    <option value="Tier 1">Tier 1 Banks (First Bank, GTB, UBA, Zenith)</option>
                                                                    <option value="Tier 2">Tier 2 Banks (Globus, Parallax, Fidelity)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="loan-duration" class="input-item-label">Loan Duration (Months) <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="loan-duration" id="loan-duration">
                                                                    <option selected disabled value="">Select Loan Duration</option>
                                                                    <option>1 Month</option>
                                                                    <option>2 Months</option>
                                                                    <option>3 Months</option>
                                                                    <option>4 Months</option>
                                                                    <option>5 Months</option>
                                                                    <option>6 Months</option>
                                                                    <option>7 Months</option>
                                                                    <option>8 Months</option>
                                                                    <option>9 Months</option>
                                                                    <option>10 Months</option>
                                                                    <option>11 Months</option>
                                                                    <option>12 Months</option>
                                                                    <option>13 Months</option>
                                                                    <option>14 Months</option>
                                                                    <option>15 Months</option>
                                                                    <option>16 Months</option>
                                                                    <option>17 Months</option>
                                                                    <option>18 Months</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Start Date <span class="text-danger">*</span></label>
                                                                <input class="input-bordered date-picker" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">End Date <span class="text-danger">*</span></label>
                                                                <input class="input-bordered date-picker" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label for="purpose" class="input-item-label">Purpose of Fund <span class="text-danger">*</span></label>
                                                                <select class="select-bordered select-block" name="purpose" id="purpose">
                                                                    <option selected disabled value="">Select Purpose</option>
                                                                    <option>Visa Application</option>
                                                                    <option>Business</option>
                                                                    <option>Education</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gaps-1x"></div>
                                                    <div class="d-sm-flex justify-content-between align-items-center">
                                                        <a href="individual-application" class="btn btn-primary btn-between">
                                                            Submit <em class="ti ti-save"></em>
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="documents">
                                    <div class="kyc-form-steps card mx-lg-4 mb-0">
                                        <div class="form-step form-step4">
                                            <div class="form-step-head card-innr">
                                                <div class="step-head">
                                                    <div class="step-number">04</div>
                                                    <div class="step-head-text">
                                                        <h4>Documents Upload</h4>
                                                        <p>Informations about your proof of funds</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <form>
                                                <div class="form-step-fields card-innr">
                                                    <div class="note note-plane note-light-alt note-md pdb-0-5x">
                                                        <em class="fas fa-info-circle"></em>
                                                        <p>In order to complete, please upload any of the following means of identity.</p>
                                                    </div>
                                                    <div class="gaps-2x"></div>
                                                    <ul class="nav nav-tabs nav-tabs-bordered row flex-wrap guttar-20px" role="tablist">
                                                        <li class="nav-item flex-grow-0">
                                                            <a class="nav-link d-flex align-items-center active" data-toggle="tab" href="#passport">
                                                                <div class="nav-tabs-icon">
                                                                    <img src="./assets/images/icon-passport.png" alt="icon">
                                                                    <img src="./assets/images/icon-passport.png" alt="icon">
                                                                </div>
                                                                <span>Passport</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item flex-grow-0">
                                                            <a class="nav-link d-flex align-items-center" data-toggle="tab" href="#national-card">
                                                                <div class="nav-tabs-icon">
                                                                    <img src="./assets/images/icon-national-id.png" alt="icon">
                                                                    <img src="./assets/images/icon-national-id-color.png" alt="icon">
                                                                </div>
                                                                <span>National Card</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item flex-grow-0">
                                                            <a class="nav-link d-flex align-items-center" data-toggle="tab" href="#driver-licence">
                                                                <div class="nav-tabs-icon">
                                                                    <img src="./assets/images/icon-licence.png" alt="icon">
                                                                    <img src="./assets/images/icon-licence-color.png" alt="icon">
                                                                </div>
                                                                <span>Driver’s License</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="passport">
                                                            <h5 class="text-secondary font-bold">To avoid delays when verifying account, Please make sure bellow:</h5>
                                                            <ul class="list-check">
                                                                <li>Chosen credential must not be expaired.</li>
                                                                <li>Document should be good condition and clearly visible.</li>
                                                                <li>Make sure that there is no light glare on the card.</li>
                                                            </ul>
                                                            <div class="gaps-2x"></div>
                                                            <h5 class="font-mid">Upload Here Your Passport Copy</h5>
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-8">
                                                                    <div class="upload-box">
                                                                        <div class="upload-zone">
                                                                            <div class="dz-message" data-dz-message>
                                                                                <span class="dz-message-text">Drag and drop file</span>
                                                                                <span class="dz-message-or">or</span>
                                                                                <button class="btn btn-primary">SELECT</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 d-none d-sm-block">
                                                                    <div class="mx-md-4">
                                                                        <img src="./assets/images/vector-passport.png" alt="vector">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade" id="national-card">
                                                            <h5 class="text-secondary font-bold">To avoid delays when verifying account, Please make sure bellow:</h5>
                                                            <ul class="list-check">
                                                                <li>Chosen credential must not be expaired.</li>
                                                                <li>Document should be good condition and clearly visible.</li>
                                                                <li>Make sure that there is no light glare on the card.</li>
                                                            </ul>
                                                            <div class="gaps-2x"></div>
                                                            <h5 class="font-mid">Upload Here Your National id Front Side</h5>
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-8">
                                                                    <div class="upload-box">
                                                                        <div class="upload-zone">
                                                                            <div class="dz-message" data-dz-message>
                                                                                <span class="dz-message-text">Drag and drop file</span>
                                                                                <span class="dz-message-or">or</span>
                                                                                <button class="btn btn-primary">SELECT</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 d-none d-sm-block">
                                                                    <div class="mx-md-4">
                                                                        <img src="./assets/images/vector-id-front.png" alt="vector">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="gaps-3x"></div>
                                                            <h5 class="font-mid">Upload Here Your National id Back Side</h5>
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-8">
                                                                    <div class="upload-box">
                                                                        <div class="upload-zone">
                                                                            <div class="dz-message" data-dz-message>
                                                                                <span class="dz-message-text">Drag and drop file</span>
                                                                                <span class="dz-message-or">or</span>
                                                                                <button class="btn btn-primary">SELECT</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 d-none d-sm-block">
                                                                    <div class="mx-md-4">
                                                                        <img src="./assets/images/vector-id-back.png" alt="vector">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane fade" id="driver-licence">
                                                            <h5 class="text-secondary font-bold">To avoid delays when verifying account, Please make sure bellow:</h5>
                                                            <ul class="list-check">
                                                                <li>Chosen credential must not be expaired.</li>
                                                                <li>Document should be good condition and clearly visible.</li>
                                                                <li>Make sure that there is no light glare on the card.</li>
                                                            </ul>
                                                            <div class="gaps-2x"></div>
                                                            <h5 class="font-mid">Upload Here Your Driving Licence Copy</h5>
                                                            <div class="row align-items-center">
                                                                <div class="col-sm-8">
                                                                    <div class="upload-box">
                                                                        <div class="upload-zone">
                                                                            <div class="dz-message" data-dz-message><span class="dz-message-text">Drag and drop file</span><span class="dz-message-or">or</span><button class="btn btn-primary">SELECT</button></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 d-none d-sm-block">
                                                                    <div class="mx-md-4"><img src="./assets/images/vector-licence.png" alt="vector"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">ID Number <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">ID Expiry Date <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">NIN <span class="text-danger">*</span></label>
                                                                <input class="input-bordered" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Proof of Travel <span class="text-danger">*</span> (e.g., visa application, flight booking, admission letter)</label>
                                                                <div class="upload-zone dropzone dz-clickable">
                                                                    <div class="dz-message" data-dz-message="">
                                                                        <span class="dz-message-text">Drag and drop file</span>
                                                                        <span class="dz-message-or">or</span>
                                                                        <button class="btn btn-sm btn-primary">Choose a File</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Utility Bill <span class="text-danger">*</span> (e.g., Electricity, DSTV, Rent)</label>
                                                                <div class="upload-zone dropzone dz-clickable">
                                                                    <div class="dz-message" data-dz-message="">
                                                                        <span class="dz-message-text">Drag and drop file</span>
                                                                        <span class="dz-message-or">or</span>
                                                                        <button class="btn btn-sm btn-primary">Choose a File</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Passport Photograph <span class="text-danger">*</span></label>
                                                                <div class="upload-zone dropzone dz-clickable">
                                                                    <div class="dz-message" data-dz-message="">
                                                                        <span class="dz-message-text">Drag and drop file</span>
                                                                        <span class="dz-message-or">or</span>
                                                                        <button class="btn btn-sm btn-primary">Choose a File</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="input-item input-with-label">
                                                                <label class="input-item-label">Signature Sample <span class="text-danger">*</span></label>
                                                                <div class="upload-zone dropzone dz-clickable">
                                                                    <div class="dz-message" data-dz-message="">
                                                                        <span class="dz-message-text">Drag and drop file</span>
                                                                        <span class="dz-message-or">or</span>
                                                                        <button class="btn btn-sm btn-primary">Choose a File</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="gaps-1x"></div>
                                                    <div class="d-sm-flex justify-content-between align-items-center">
                                                        <a href="individual-application" class="btn btn-primary btn-between">
                                                            Submit <em class="ti ti-save"></em>
                                                        </a>
                                                    </div>
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
        </div>
    </div>

<?php include "./components/footer.php"; ?>