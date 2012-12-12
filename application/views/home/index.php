<?php $this->neat->css('css/bs.min.css'); ?>
<?php $this->neat->js('js/jq.min.js'); ?>

<?php $this->neat->meta_tag_link('description','Neat Template Manager'); ?>

<?php $this->neat->get_elements('home/hello',$sample1); ?>
<br></br>
<p>This variable From inside the view direct - <?php echo $sample1; ?></p>

