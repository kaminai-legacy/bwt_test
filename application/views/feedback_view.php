<?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>
    <?foreach($data->contain as $key=>$value):?>
        <div class="container">
            <div class="<?
                    if($_SESSION["user"]["id"]==$value["user_id"])
                    {
                        echo 'row justify-content-end';
                    }   
                    else
                    {
                        echo 'row justify-content-start';
                    }       
                ?>"
                >
                <div class="col-sm-10">
                    <div class="panel panel-default <?if($_SESSION["user"]["id"]==$value["user_id"])
                    {
                        echo 'itself-feedback';
                    }   
                    else
                    {
                        echo '';
                    }       
                ?>" 
                >
                        <div class="panel-heading">
                        <?php if ($_SESSION["user"]["id"]==$value["user_id"]): ?>
                            <strong>
                                <?="Вы"?>
                            </strong>
                        <?php else: ?>
                            <strong>
                                <?= $value["name"]?>
                            </strong>
                            <span class="text-muted">
                                (<?= $value["email"]?>)
                            </span>
                        <?php endif; ?>
                        </div>
                        <div class="panel-body">
                            <?= $value["text"]?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?endforeach;?>
<div class="container">
    <div class="row justify-content-center">
        <nav aria-label="Page navigation example" style="display: inline-flex;">
            <ul class="pagination" style="display: inline-flex;">
                <li class="page-item <?if($data->current_page-1 <= 0){ echo "disabled";}?>">
                    <a class="page-link" href=<?=$data->current_page-1?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?for($i = $data->fist_page_for_pagination; $i <= $data->last_page_for_pagination; $i++):?>
                    <li class="page-item <?if($data->current_page == $i){ echo "disabled";}?> <?if($data->current_page == $i){ echo "active";}?>">
                        <a 
                        class="page-link"  
                        style="<?if($data->current_page == $i){ echo "color: #fff;background-color: #007bff;border-color: #007bff;";}?>" 
                        href=<?= $i?>>
                            <?= $i?>
                        </a>
                    </li>
                <?endfor;?>
                <li class="page-item <?if($data->current_page+1 > $data->last_page_for_pagination){ echo "disabled";}?>">
                    <a class="page-link" href=<?=$data->current_page+1?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<hr/>
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
            <input type="text" class="form-control" id="validationServer01" placeholder="Имя" value="" data-validation="name" name="name" required>
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationServer01">Email пользователя</label>
            <input type="email" class="form-control" id="validationServer01" placeholder="Email" value="" data-validation="email" name="email" required>
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
            <textarea type="text" class="form-control" id="validationServer01" placeholder="Отзыв, все очень круто" value="" data-validation="feedback" name="feedback" required></textarea>
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
<?php else: ?>
    <h4>
        Для просмотра этой страницы, вы должны авторизоватся
    </h4>
<?php endif; ?>