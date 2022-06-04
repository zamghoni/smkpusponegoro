<?php if ($this->session->has_userdata('success')) { ?>
<div id="notice" class="alert alert-primary">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?=$this->session->flashdata('success');?>
</div>
<p></p>
<?php } ?>
<?php if ($this->session->has_userdata('error')) { ?>
<div id="notice" class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?=$this->session->flashdata('error');?>
</div>
<p></p>
<?php } ?>
