<?php
include "./components/header.php";
include "./components/top_navbar.php";
?>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="main-content col-lg-8">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-with-label"><label for="old-pass" class="input-item-label">Old Password</label><input class="input-bordered" type="password" id="old-pass" name="old-pass"></div>
                                            <!-- .input-item -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-with-label"><label for="new-pass" class="input-item-label">New Password</label><input class="input-bordered" type="password" id="new-pass" name="new-pass"></div>
                                            <!-- .input-item -->
                                        </div>
                                        <!-- .col -->
                                        <div class="col-md-6">
                                            <div class="input-item input-with-label"><label for="confirm-pass" class="input-item-label">Confirm New Password</label><input class="input-bordered" type="password" id="confirm-pass" name="confirm-pass"></div>
                                            <!-- .input-item -->
                                        </div>
                                        <!-- .col -->
                                    </div>
                                    <!-- .row -->
                                    <div class="note note-plane note-info pdb-1x"><em class="fas fa-info-circle"></em>
                                        <p>Password should be minmum 8 letter and include lower and uppercase letter.</p>
                                    </div>
                                    <div class="gaps-1x"></div>
                                    <!-- 10px gap -->
                                    <div class="d-sm-flex justify-content-between align-items-center"><button class="btn btn-primary">Update</button>
                                        <div class="gaps-2x d-sm-none"></div><span class="text-success"><em class="ti ti-check-box"></em>  Changed Password</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <div class="aside sidebar-right col-lg-4">
                    <div class="account-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Your Account Status</h6>
                            <ul class="btn-grp">
                                <li><a href="#" class="btn btn-auto btn-xs btn-success">Email Verified</a></li>
                                <li><a href="#" class="btn btn-auto btn-xs btn-warning">KYC Pending</a></li>
                            </ul>
                            <div class="gaps-2-5x"></div>
                            <h6 class="card-title card-title-sm">Receiving Wallet</h6>
                            <div class="d-flex justify-content-between">
                                <span>
                                    <span>0x39deb3.....e2ac64rd</span> 
                                    <em class="fas fa-info-circle text-exlight" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 TWZ"></em>
                                </span>
                                <a href="#" data-toggle="modal" data-target="#edit-wallet" class="link link-ucap">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
            </div>
            <!-- .container -->
        </div>
        <!-- .container -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit-wallet" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h4 class="popup-title">Wallet Address</h4>
                    <p>In order to receive your <a href="#"><strong>TWZ Tokens</strong></a>, please select your wallet address and you have to put the address below input box. <strong>You will receive TWZ tokens to this address after the Token Sale end.</strong></p>
                    <form
                        action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-with-label"><label for="swalllet" class="input-item-label">Select Wallet </label><select class="select-bordered select-block" name="swalllet" id="swalllet"><option value="eth">Ethereum</option><option value="dac">DashCoin</option><option value="bic">BitCoin</option></select></div>
                                <!-- .input-item -->
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- .row -->
                        <div class="input-item input-with-label"><label for="token-address" class="input-item-label">Your Address for tokens:</label><input class="input-bordered" type="text" id="token-address" name="token-address" value="0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae"><span class="input-note">Note: Address should be ERC20-compliant.</span></div>
                        <!-- .input-item -->
                        <div class="note note-plane note-danger"><em class="fas fa-info-circle"></em>
                            <p>DO NOT USE your exchange wallet address such as Kraken, Bitfinex, Bithumb, Binance etc. You can use MetaMask, MayEtherWallet, Mist wallets etc. Do not use the address if you don’t have a private key of the your address. You
                                WILL NOT receive TWZ Tokens and WILL LOSE YOUR FUNDS if you do.</p>
                        </div>
                        <div class="gaps-3x"></div>
                        <div class="d-sm-flex justify-content-between align-items-center"><button class="btn btn-primary">Update Wallet</button>
                            <div class="gaps-2x d-sm-none"></div><span class="text-success"><em class="ti ti-check-box"></em> Updated wallet address</span></div>
                        </form>
                        <!-- form -->
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>
    
<?php 
include "./modals/profile_update_modal.php";
include "./components/footer.php";
?>