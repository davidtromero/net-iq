

<?php
  global $clients;
  $link =  $clients->field("link");
  $title = $clients->field("title");
  $attachment = $clients->field("attachment-thumbnail");
  $class = $clients->field('class');
?>
<li><a style="cursor: none;"><div class="<?php echo $class;?> animated animate-from-left"></div><br/>
    <div class="border"><?php echo $title;?></div></a></li>

