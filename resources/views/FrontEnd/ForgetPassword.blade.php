
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
    
