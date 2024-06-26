<?php
 session_start();
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Catster</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/5f1b7c0a83.js" crossorigin="anonymous"></script>
        <link href="assets/css/carousel.css" rel="stylesheet">
        <script src="assets/js/color-modes.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    </head>

    <style>
        *,
        *:before,
        *:after {
        box-sizing: border-box;
        }
        body {
        padding: 1em;
        font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 15px;
        color: #b9b9b9;
        background-color: #e3e3e3;
        }
        h4 {
        color: #f0a500;
        }
        input,
        input[type="radio"] + label,
        input[type="checkbox"] + label:before,
        select option,
        select {
        width: 100%;
        padding: 1em;
        line-height: 1.4;
        background-color: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 3px;
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        input:focus {
        outline: 0;
        border-color: #bd8200;
        }
        input:focus + .input-icon i {
        color: #f0a500;
        }
        input:focus + .input-icon:after {
        border-right-color: #f0a500;
        }
        input[type="radio"] {
        display: none;
        }
        input[type="radio"] + label,
        select {
        display: inline-block;
        width: 50%;
        text-align: center;
        float: left;
        border-radius: 0;
        }
        input[type="radio"] + label:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        input[type="radio"] + label:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        input[type="radio"] + label i {
        padding-right: 0.4em;
        }
        input[type="radio"]:checked + label,
        input:checked + label:before,
        select:focus,
        select:active {
        background-color: #f0a500;
        color: #fff;
        border-color: #bd8200;
        }
        input[type="checkbox"] {
        display: none;
        }
        input[type="checkbox"] + label {
        position: relative;
        display: block;
        padding-left: 1.6em;
        }
        input[type="checkbox"] + label:before {
        position: absolute;
        top: 0.2em;
        left: 0;
        display: block;
        width: 1em;
        height: 1em;
        padding: 0;
        content: "";
        }
        input[type="checkbox"] + label:after {
        position: absolute;
        top: 0.45em;
        left: 0.2em;
        font-size: 0.8em;
        color: #fff;
        opacity: 0;
        font-family: FontAwesome;
        content: "\f00c";
        }
        input:checked + label:after {
        opacity: 1;
        }
        select {
        height: 3.4em;
        line-height: 2;
        }
        select:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
        }
        select:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
        }
        select:focus,
        select:active {
        outline: 0;
        }
        select option {
        background-color: #f0a500;
        color: #fff;
        }
        .input-group {
        margin-bottom: 1em;
        zoom: 1;
        }
        .input-group:before,
        .input-group:after {
        content: "";
        display: table;
        }
        .input-group:after {
        clear: both;
        }
        .input-group-icon {
        position: relative;
        }
        .input-group-icon input {
        padding-left: 4.4em;
        }
        .input-group-icon .input-icon {
        position: absolute;
        top: 0;
        left: 0;
        width: 3.4em;
        height: 3.4em;
        line-height: 3.4em;
        text-align: center;
        pointer-events: none;
        }
        .input-group-icon .input-icon:after {
        position: absolute;
        top: 0.6em;
        bottom: 0.6em;
        left: 3.4em;
        display: block;
        border-right: 1px solid #e5e5e5;
        content: "";
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        .input-group-icon .input-icon i {
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
        }
        .container {
        max-width: 38em;
        padding: 1em 3em 2em 3em;
        margin: 0em auto;
        background-color: #fff;
        border-radius: 4.2px;
        box-shadow: 0px 3px 10px -2px rgba(0, 0, 0, 0.2);
        }
        .row {
        zoom: 1;
        }
        .row:before,
        .row:after {
        content: "";
        display: table;
        }
        .row:after {
        clear: both;
        }
        .col-half {
        padding-right: 10px;
        float: left;
        width: 50%;
        }
        .col-half:last-of-type {
        padding-right: 0;
        }
        .col-third {
        padding-right: 10px;
        float: left;
        width: 33.33333333%;
        }
        .col-third:last-of-type {
        padding-right: 0;
        }
        @media only screen and (max-width: 540px) {
        .col-half {
            width: 100%;
            padding-right: 0;
        }
        }

    </style>

    <body>
        <?php include 'include/menu.php'; ?>

        <div class="container" style="margin-top: 80px;">
            <form>
                <div class="row">
                    <h4 class="mt-2">Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Full Name">
                        <div class="input-icon">
                        <i class="fa fa-user ms-3"></i>
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="email" placeholder="Email Adress">
                        <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" placeholder="Password">
                        <div class="input-icon">
                        <i class="fa fa-key"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-half">
                        <h4>Date</h4>
                        <div class="input-group">
                            <div class="col">
                                <input type="date" placeholder="DD">
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <h4>Gender</h4>
                        <div class="input-group">
                        <input id="gender-male" type="radio" name="gender" value="male">
                        <label for="gender-male">Male</label>
                        <input id="gender-female" type="radio" name="gender" value="female">
                        <label for="gender-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>Payment Details</h4>
                    <div class="input-group">
                        <input id="payment-method-card" type="radio" name="payment-method" value="card" checked="true">
                        <label for="payment-method-card">
                        <span><i class="fa fa-cc-visa"></i>Credit Card</span>
                        </label>
                        <input id="payment-method-paypal" type="radio" name="payment-method" value="paypal">
                        <label for="payment-method-paypal">
                        <span><i class="fa fa-cc-paypal"></i>Paypal</span>
                        </label>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="file">
                        <div class="input-icon">
                        <i class="fa fa-credit-card"></i>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group input-group-icon">
                        <input type="text" placeholder="Card CVC">
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <div class="input-group">
                        <select>
                            <option>01 Jan</option>
                            <option>02 Jan</option>
                        </select>
                        <select>
                            <option>2015</option>
                            <option>2016</option>
                        </select>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </body>
</html>
