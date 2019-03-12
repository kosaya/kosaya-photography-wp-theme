<div id="contact" class="contact page inner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 title">
        <h2>Contact Me</h2>
      </div><!--title-->
    </div>
    <div class="row social">
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <div class="col-sm-12 col-md-9 col-md-offset-3">
        <ul class="nav nav-pills nav-justified">
          <li><a href="http://instagram.com/katekosaya" target="_blank"><em class="fa fa-instagram"></em></a></li>
          <li><a href="https://www.linkedin.com/profile/view?id=139028482" target="_blank"><em class="fa fa-linkedin-square"></em></a></li>
          <li><a href="http://twitter.com/KateKosaya" target="_blank"><em class="fa fa-twitter-square"></em></a></li>
          <li><a href="http://www.facebook.com/lublyou" target="_blank"><em class="fa fa-facebook-square"></em></a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <form class="form-horizontal kosaya-contact" action="<?php echo get_stylesheet_directory_uri(); ?>/inc/send.php" method="post">
        <div class="form-group">
          <label for="firstName" class="col-sm-3 control-label">First Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="firstName" name="firstName">
          </div>
        </div>
        <div class="form-group">
          <label for="lastName" class="col-sm-3 control-label">Last Name</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" name="lastName">
          </div>
        </div>
        <div class="form-group">
          <label for="emailAddress" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="emailAddress" name="emailAddress" placeholder="you@example.com">
          </div>
        </div>
        <div class="form-group">
          <label for="message" class="col-sm-3 control-label">Message</label>
          <div class="col-sm-9">
            <input type="text" class="form-control special" id="subject" name="subject" placeholder="If you're human, don't fill this." value=" ">
            <textarea class="form-control" id="message" name="message"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3"></div>
          <div class="col-sm-9">
            <button type="submit" class="btn kosaya-submit btn-default">Send</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div><!--contact-->