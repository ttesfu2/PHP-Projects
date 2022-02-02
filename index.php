<?php   
    require_once('startsession.php');
    $title = "Home";
    require_once('header.php');
    require_once('navmenu.php');
    
    $today = date("F j, Y");
?>

<div class="card pt-5 mx-5 my-5" style="max-width: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="image/img.jpg" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Tube Feed Tips</h5>
        <p class="card-text">Resources are designed to support families and caregivers faced with many new, and often challenging,
             responsibilities. Use these guides to help safely operate and maintain equipment, organize supplies, keep adult and
             pediatric patients healthy at home, and make sure both you and your patients are living the best lives possible.</p>
        <p class="card-text"><small class="text-muted">Last updated <?php echo $today ?> </small></p>
      </div>
    </div>
  </div>
</div>

<?php
     require_once('footer.php');
?>
