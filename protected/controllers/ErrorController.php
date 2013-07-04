<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jacky
 * Date: 4/07/13
 * Time: 4:23 PM
 * To change this template use File | Settings | File Templates.
 */
class ErrorController extends CController
{

    public function actionError()
    {
        var_dump( Yii::app()->errorHandler->error );
    }

}
