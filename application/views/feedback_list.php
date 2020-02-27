<?php if ((!(empty($_SESSION['user']))) && (isset($_SESSION['user']))): ?>
    <?foreach($data->contain as $key=>$value):?>
        <div class="container">
            <div class="<?php
                    if ($_SESSION['user']['id'] == $value['user_id']) {
                        echo 'row justify-content-end';
                    } else {
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
                            <?php if ($_SESSION['user']['id'] == $value['user_id']): ?>
                                <strong>
                                    <?='Вы'?>
                                </strong>
                            <?php else: ?>
                                <strong>
                                    <?= $value['name']?>
                                </strong>
                                <span class="text-muted">
                                    (<?= $value['email']?>)
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="panel-body">
                            <?= $value['text']?>
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
                    <a class="page-link" href=<?=$data->current_page - 1?> aria-label="Previous">
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
                    <a class="page-link" href=<?=$data->current_page + 1?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<hr/>
<div class="btn-wrapper">
        <a class="btn btn-primary" href=<?= FEEDBACK_URL?>>Оставить отзыв</a>
    </div>
<?php else: ?>
    <div class="container">
        <div class="row justify-content-center">
            <h4>
                Для просмотра этой страницы, вы должны <a class="p-2 bolder dark-blue" href=<?= AUTHORIZATION_URL?>>Авторизоватся</a>
            </h4>
        </div>
    </div>
<?php endif; ?>