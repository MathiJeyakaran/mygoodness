<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="icon" href="images/favicon.png" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <title>{{ config('app.name', 'mygoodness') }}</title>
        <!--fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700;800;900&family=Barlow:wght@100;200;300;400;500;600;700;800;900&family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />

        <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="css/global.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/selectize.css" />
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"/> -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" ></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>
        <style>
            .selectize-contro{
                border-radius:36px !important;
                display:inline-block;
                overflow:hidden;
                background:#cccccc;
                border:1px solid #cccccc;
                }              
        </style>    
       
    
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Barlow Condensed:wght@600&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;1,400&display=swap"
    />
    
  </head>
  <body>
    
      <div class="pick-your-payment">
        <img
          class="pick-your-payment-child"
          alt=""
          src="images/group-1.svg"
        />

        <img
          class="pick-your-payment-item"
          alt=""
          src="images/group-1869.svg"
        />

        <div class="my-account">My&nbsp;Account</div>
        <div class="complete-payment">Complete Payment</div>
        <img
          class="pick-your-payment-inner"
          alt=""
          src="images/group-1855.svg"
        />

        <div class="rectangle-div"></div>
        <div class="nonprofit-name-ein-container">
          <p class="nonprofit-name">[nonprofit name]</p>
          <p class="nonprofit-name">[EIN #]</p>
        </div>
        <div class="pick-your-payment-child1"></div>
        <div class="nonprofit-logo-pull">
          [nonprofit logo] pull from every.org
        </div>
        <div class="not-the-right-place-go-back-parent">
          <i class="not-the-right-container">
            <span>...not the right place? </span>
            <span class="go-back">go back</span>
          </i>
          <div class="group-child"></div>
        </div>
        <div class="your-donation-will">Your Donation will be sent to:</div>
        <div class="donation">Donation</div>
        <div class="summary">Summary</div>
        <div class="div">$10.00</div>
        <div class="contribution">Contribution</div>
        <div class="div1">$1.10</div>
        <div class="total">Total</div>
        <div class="div2">$11.00</div>
        <div class="line-div"></div>
       <!-- <div style="bottom:120px;position:absolute;margin-left:40px;">
        <label class="main">Apple Pay
        <input type="checkbox">
        <span class="geekmark"></span>
    </label>
      
    <label class="main">PayPal
        <input type="checkbox" checked="checked">
        <span class="geekmark"></span>
    </label>
            </div>-->
        <div style="bottom:80px;position:absolute;margin-left:15px;" class="col-sm-12">
        <button style="margin-left:3%;background-color:black;border : black;color:white;width:300px;padding : 12px 12px 12px 12px;border-radius:10px;font: 600 24px/32px 
Barlow Condensed;">Confirm Payment</button>
            </div>
        
            </div>

  </body>
</html>
