<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wangfei0001
 * Date: 13-7-30
 * Time: PM8:44
 * To change this template use File | Settings | File Templates.
 */
class TripPost extends TripPostBase
{


    /***
     * Get Upload path
     *
     * @return mixed
     * @throws Exception
     */
    public function getUploadPath()
    {
        if(!$this->fk_user || !$this->fk_trip){
            throw new Exception('Fatal Error. User and Trip id must be set!');
        }

        $configPath = Yii::app()->params['photo']['uploadPath'];

        return Yii::app()->baseUrl .str_replace(array('{UID}','{TripID}'), array($this->fk_user, $this->fk_trip), $configPath);
    }



    /***
     * @param $path
     */
    public function makeAccess($path)
    {

        $arr = explode('/', $path);

        $basePath = array_shift($arr);
        foreach($arr as $val){
            if(!empty($val)){
                $curPath = $basePath .'/' .$val;
                if(!file_exists($curPath)){
                    mkdir($curPath);
                }
                if(!is_writable($curPath)) chmod($curPath, 0777);
                $basePath = $curPath;
            }
        }
    }

    public function uploadFiles($files)
    {

        if(isset($files['photo'])){

            $files = $files['photo'];

            if(isset($files)){
    //            foreach($files['photo'] as $photo){
    //                //Yii::log(var_export($photo,true), CLogger::LEVEL_INFO, 'system.web');
    //                //echo Yii::trace(CVarDumper::dumpAsString($photo),'vardump');
    //
    //            }
                $names = $files['name'];
                $types = $files['type'];
                $tmp_names = $files['tmp_name'];
                $errors = $files['error'];
                $sizes = $files['size'];

                $uploadPath = $this->getUploadPath();
                //make the path readable and writable
                $this->makeAccess($uploadPath);

                for($i = 0; $i < count($names); $i++){
                    $name = $names[$i];
                    $type = $types[$i];
                    $tmp_name = $tmp_names[$i];
                    $error = $errors[$i];
                    $size = $sizes[$i];

                    if($error == 0 &&
                        in_array($type, $this->getSupportedMimetypes()) &&
                        file_exists($tmp_name) &&
                        $size > 0){    //no errors

                        $nameName = Randomness::randomString(16);

                        $info = pathinfo($name);


                        $newFileName = $nameName .'.' .$info['extension'];

//                        echo Yii::trace(CVarDumper::dumpAsString($info),'vardump');
//                        return;
//                        echo Yii::trace(CVarDumper::dumpAsString($uploadPath .$newFileName),'vardump');
//                        return;

                        move_uploaded_file($tmp_name, $uploadPath .$newFileName);


                    }
                }
            }
        }

    }


    /***
     * get Supported Mimetypes
     *
     * @return array
     */
    protected function getSupportedMimetypes()
    {
        return array(
            'image/jpeg'
        );
    }
}
