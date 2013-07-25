<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-25
 * Time: PM7:18
 * To change this template use File | Settings | File Templates.
 */

Yii::import('application.models.AirportCodeBase');

class GenerateDataCommand extends CConsoleCommand
{

    /***
     *
     */
    public function actionChinese()
    {
        $path = Yii::app()->basePath .'/data/airport1';
        $content = file_get_contents($path);

        $lines = explode("\n", $content);

        $i = 0;
        foreach($lines as $line){
            $arr = explode(",", $line);

            $code = $arr[count($arr)-1];

            if(strlen($code) == 3 && preg_match('/[a-zA-Z]{3}/is',$code)){
                $airportName = $arr[count($arr)-2];

                $model = AirportCodeBase::model()->find('code = :code', array('code' => $code));

                if(!$model) $model = new AirportCodeBase();

                $model->name = $airportName;
                $model->code = $code;
                $model->country_name = '中国';
                $model->save();
                unset($model);
                $i++;
            }
        }

        echo '已经导入了' .$i .'个中国机场';

    }

    public function actionInternational()
    {
        $path = Yii::app()->basePath .'/data/airport2';
        $content = file_get_contents($path);

        $lines = explode("\n", $content);
        $i = 0;
        foreach($lines as $line){
            $arr = explode(",", $line);

            $massCode = $arr[count($arr)-1];

            if(preg_match('/([a-zA-Z]{3})/is', $massCode, $res)){
                $code = $res[1];
                $country = $arr[count($arr)-2];

                $model = AirportCodeBase::model()->find('code = :code', array('code' => $code));

                if(!$model) $model = new AirportCodeBase();


                $model->name = trim($arr[count($arr)-3]);
                $model->country_name = $country;

                $model->code = $code;
                $model->save();

                unset($model);

                $i++;
            }
        }

        echo '已经导入了' .$i .'个国际机场';

    }
}
