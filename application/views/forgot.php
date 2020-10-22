    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/theme/css/style.css">
    <!------ Include the above in your HEAD tag ---------->
    <meta charset="utf-8">
  </head>
  <body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form action="<?= site_url('forgot');?>" method="post">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="email">
      <input type="submit" class="fadeIn fourth" value="Forgot Password">
    </form>

  </div>
</div>
  </body>
</html>
