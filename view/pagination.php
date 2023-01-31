<ul class="pagination justify-content-center" style="margin:20px 0">
  <li class="page-item"><a class="page-link" href="<?= $url ?>?page=1">First</a></li>
  <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?= ($page>1) ? $page-1 : 1 ?>"> <- </a></li>
  <?php
  if($number_page==1){
  ?>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=1"> 1 </a></li>
  <?php
  }else if($number_page==2){
    if($page==1){
  ?>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=1"> 1 </a></li>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=2"> 2 </a></li>
  <?php
    }else{
  ?>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=1"> 1 </a></li>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=2"> 2 </a></li>
  <?php  
    }
  }else{
    if($page==1){
  ?>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=1"> 1 </a></li>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=2"> 2 </a></li>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=3"> 3 </a></li>  
    <?php
    }
    else if($page==$number_page){
    ?>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?=$number_page-2?>"> <?=$number_page-2?> </a></li>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?=$number_page-1?>"> <?=$number_page-1?> </a></li>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=<?=$number_page?>"> <?=$number_page?> </a></li>
    <?php
    }
    else{
    ?>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?=$page-1?>"> <?=$page-1?> </a></li>
    <li class="page-item active"><a class="page-link" href="<?= $url ?>?page=<?=$page?>"> <?=$page?> </a></li>
    <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?=$page+1?>"> <?=$page+1?> </a></li>
    <?php
    }
  }
  ?>
  <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?= ($page<$number_page) ? $page+1 : $number_page ?>">-></a></li>
  <li class="page-item"><a class="page-link" href="<?= $url ?>?page=<?=$number_page?>">Last</a></li>
</ul>