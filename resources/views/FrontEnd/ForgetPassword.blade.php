<!-- <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
	<meta name="keywords" content="forgot password page, basic html and css">
	<title>Forgot Password Page - HTML + CSS</title>
</head>
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "segoe ui", verdana, helvetica, arial, sans-serif;
  font-size: 16px;
  transition: all 500ms ease; }

body {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
  -moz-font-feature-settings: "liga" on; }

.row {
  background-color: #eb8c34;
  color: #fff;
  text-align: center;
  padding: 2em 2em 0.5em;
  width: 90%;
  margin: 2em	auto;
  border-radius: 5px; }
  .row h1 {
    font-size: 2.5em; }
  .row .form-group {
    margin: 0.5em 0; }
    .row .form-group label {
      display: block;
      color: #fff;
      text-align: left;
      font-weight: 600; }
    .row .form-group input, .row .form-group button {
      display: block;
      padding: 0.5em 0;
      width: 100%;
      margin-top: 1em;
      margin-bottom: 0.5em;
      background-color: inherit;
      border: none;
      border-bottom: 1px solid #555;
      color: #eee; }
      .row .form-group input:focus, .row .form-group button:focus {
        background-color: #fff;
        color: #000;
        border: none;
        padding: 1em 0.5em; animation: pulse 1s infinite ease;}
    .row .form-group button {
      border: 1px solid #fff;
      border-radius: 5px;
      outline: none;
      -moz-user-select: none;
      user-select: none;
      color: #333;
      font-weight: 800;
      cursor: pointer;
      margin-top: 2em;
      padding: 1em; }
      .row .form-group button:hover, .row .form-group button:focus {
        background-color: #fff; }
      .row .form-group button.is-loading::after {
        animation: spinner 500ms infinite linear;
        content: "";
        position: absolute;
        margin-left: 2em;
        border: 2px solid #000;
        border-radius: 100%;
        border-right-color: transparent;
        border-left-color: transparent;
        height: 1em;
        width: 4%; }
  .row .footer h5 {
    margin-top: 1em; }
  .row .footer p {
    margin-top: 2em; }
    .row .footer p .symbols {
      color: #444; }
  .row .footer a {
    color: inherit;
    text-decoration: none; }

.information-text {
  color: #ddd; }

@media screen and (max-width: 320px) {
  .row {
    padding-left: 1em;
    padding-right: 1em; }
    .row h1 {
      font-size: 1.5em !important; } }
@media screen and (min-width: 900px) {
  .row {
    width: 50%; } }

</style>
<body>
	<div class="row">
		<h1>Forgot Password</h1>
		<h6 class="information-text">Enter your registered email to reset your password.</h6>
		<div class="form-group">
			<input type="email" name="user_email" id="user_email">
			<p><label for="username">Email</label></p>
			<button onclick="showSpinner()">Reset Password</button>
		</div>
		<div class="footer">
			<h5>New here? <a href="#">Sign Up.</a></h5>
			<h5>Already have an account? <a href="#">Sign In.</a></h5>
		</div>
	</div>
</body> -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
	<meta name="keywords" content="forgot password page, basic html and css">
</head>
<style>
    @import 'https://static.stayjapan.com/assets/dashboard/application-33c1a06b7784b53cd746d479718b6295c0fcefebb696e78dcee7c68efc92fada.css';


.horizontal-container {
  margin: 0 auto;
  width: 100%;
  
  @media(min-width: 768px) {
    width: 500px;
  }
  
  
  /* Create circle */
  @mixin drawCircle {
    background-color: white;
    border-radius: 50%; 
    border: 2px solid #ccc;
    color: #ccc;
    display: block;
    height: 20px;
    line-height: 18px;
    margin: 0 auto;
    text-align: center;
    width: 20px;
  }

  /* Create line */
  @mixin drawLine {
    background-color: #e5e5e5;
    content: '';
    height: 3px;
    left: -50%;
    transform: translateX(50%);
    position: absolute;
    top: 9px;
    width: 100%;
    z-index: -1;
  }

    /* Custom progress bar */
  

  }
 

  .horizontal-form-box {
    background-color: #fff;
    border: 1px solid #e5e5e5;
    height: 466px;
    padding: 30px;
    
    .horizontal-info-container {   
      img {
        height: 75px;
        margin-bottom: 20px; 
      }

      .horizontal-heading {
        color: #000;
        font-size: 22px; 
        font-weight: bold; 
        text-transform: capitalize;
      }

      .horizontal-subtitle {
        letter-spacing: 1px;
        margin-bottom: 20px;
        text-align: left;
      }
    }
  
    .horizontal-form {
      label, button {
        text-transform: capitalize;
      }

      label {
        color: #000;
        font-weight: normal;
      }
    }
  }
}
    </style>
    <body>
    <div class="container" style="margin-top: 40px; margin-left: 30%;">
  <div class="row">
    <div class="col-sm-7">
      <div class="horizontal-container">
       
        <div class="horizontal-form-box">
          <div class="horizontal-info-container text-center">
            <img src="https://static.stayjapan.com/assets/top/icon/values-7dd5c8966d7a6bf57dc4bcd11b2156e82a4fd0da94a26aecb560b6949efad2be.svg" />
            <p class="horizontal-heading">Reset your password</p>
            <p class="horizontal-subtitle">Your password needs to be at least 8 characters.</p>
          </div>
          <form class="horizontal-form">
            <div class="o3-form-group">
              <label for="new_password">New password</label>
              <input type="password" class="o3-form-control o3-input-lg" id="new_password">
            </div>
            <div class="o3-form-group">
              <label for="confirm_password">Confirm new password</label>
              <input type="password" class="o3-form-control o3-input-lg" id="confirm_password">
            </div>
            <button class="o3-btn o3-btn-primary o3-btn-block">Set new password</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    </body>
</html>
    
