<?php
  global $attachments;
  $_tag =str_replace(", "," ",$attachments->field("tags"));
  $_tag =str_replace(","," ",$attachments->field("tags"));
  $class = $attachments->field("class");
?>
<div class="mega-entry <?php echo $_tag;?> cat-all" data-src="<?php echo $attachments->src('portfolio-thumb');?>" data-width="255" data-height="255">

    <div>
        <div class="mega-hoverview">
            <a href="#" class="<?php echo $class;?>">


            </a>

        </div>

    </div>
</div>
