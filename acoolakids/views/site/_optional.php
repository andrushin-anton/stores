<?php
var_dump(Yii::$app->session->has('sign_in_success'));
if(Yii::$app->session->has('sign_in_success'))
{
    Yii::$app->session->remove('sign_in_success');

    foreach(Yii::$app->params['urls'] as $url) {?>
    <iframe width="0" height="0" name="goodFrame" src="<?php echo $url?>/site/create_session?PHPSESSID=<?=session_id()?>"></iframe>
    <?php
    }
}