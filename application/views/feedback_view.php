<?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>

    <?foreach($data->contain as $key=>$value):?>
        <p>
            <?= $value["text"]?>
        </p>
    <?endforeach;?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?if($data->current_page-1 <= 0){ echo "disabled";}?>">
      <a class="page-link" href=<?=$data->current_page-1?> aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?for($i = $data->fist_page_for_pagination; $i <= $data->last_page_for_pagination; $i++):?>
        <li class="page-item  <?if($data->current_page == $i){ echo "active";}?>"><a class="page-link" href=<?= $i?>><?= $i?></a></li>
    <?endfor;?>
    <li class="page-item <?if($data->current_page+1 > $data->last_page_for_pagination){ echo "disabled";}?>">
      <a class="page-link" href=<?=$data->current_page+1?> aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

<form method="post" class="form">
<!-- <div class="form-group">

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Имя пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваше имя" aria-describedby="basic-addon1" data-validation="name" name="name">
</div>
<div class="alert alert-danger" role="alert" id="name-error" class="input-error"></div>

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Email пользователя:</span>
    <input type="text" class="form-control" placeholder="Ваша почта" aria-describedby="basic-addon1" data-validation="email" name="email">
</div>
<div class="alert alert-danger" role="alert" id="email-error" class="input-error"></div>

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Отзыв:</span>
    <input type="text" class="form-control" placeholder="Отзыв, все очень круто" aria-describedby="basic-addon1" data-validation="feedback" name="feedback">
</div>
<div class="alert alert-danger" role="alert" id="feedback-error" class="input-error"></div> -->




<div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationServer01">Имя пользователя</label>
            <input type="text" class="form-control" id="validationServer01" placeholder="Имя" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationServer01">Email пользователя</label>
            <input type="email" class="form-control" id="validationServer01" placeholder="Email" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
</div>
<div class="form-row">
        <div class="col-md-12 mb-3">
            <label for="validationServer01">Имя пользователя</label>
            <textarea type="text" class="form-control" id="validationServer01" placeholder="Отзыв, все очень круто" value="" required></textarea>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
</div>

<div class="btn-wrapper">
        <input type="submit" class="btn btn-primary" name="feedback-submit" value="Оставить отзыв"/>
    </div>

</div>
</form>
<?php endif; ?>