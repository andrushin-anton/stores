<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$chekLink = Yii::$app->urlManager->createAbsoluteUrl(['check-code/'.$user->id.'/'.$user->code]);

?>


<table border="0" cellpadding="0"  bgcolor="#ffffff" cellspacing="0" style="width: 576px;">
    <tbody>
    <tr height="36" valign="top">
        <td width="576" style="text-align: left; font-family: 'arial'; font-weight: bold; font-style: italic; font-size: 12px;">
            Уважаемая (ый) <?=$user->getUserName()?>,
        </td>
    </tr>
    <tr >
        <td width="576" style="text-align: left; font-family: 'arial';  font-size: 12px;">
            Для завершения регистрации, пожалуйста, перейдите по ссылке:
        </td>
    </tr>
    <tr>
        <td width="576" style="text-align: left; font-family: 'arial';  font-size: 12px; line-height: 22px;">
            <a style="color: #165fd9;" href="<?=$chekLink?>"><span style="color: #165fd9; font-family: 'Arial';"><?=$chekLink?></span></a>
        </td>
    </tr>
    </tbody>
</table>
