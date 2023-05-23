<?php if(!empty($this->sNotify)) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?=$this->sNotify?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
