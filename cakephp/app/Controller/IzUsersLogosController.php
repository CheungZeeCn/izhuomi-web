<?php
App::uses('AppController', 'Controller');
/**
 * IzUsersLogos Controller
 *
 */
class IzUsersLogosController extends AppController {
    public $layout='uploadLogo';

    public function upload() {
        $uid = $this->UserAuth->getUserId();
        $sImage = $this->_uploadImageFile($uid);
        if($sImage == NULL) {
            //failed
            // set error msg here later
            $this->Session->setFlash(__('上传头像失败, 请重新尝试'));
            $this->redirect('/myprofile');
            exit();
        }

        $smallLogoName = $sImage[0];
        $largeLogoName = $sImage[2];

        //store the file now;
        $data = $this->IzUsersLogo->findByUserId($uid);
        if($data==null) {
            //insert
            $this->IzUsersLogo->create(array(
                                        'user_id' => $uid,
                                        'small_logo_addr' => $smallLogoName,
                                        'large_logo_addr' => $largeLogoName,
                                        ));
            $this->IzUsersLogo->save();
        } else {
            //update
            $id = $data['IzUsersLogo']['id'];
            $data["IzUsersLogo"]['small_logo_addr'] = $smallLogoName;
            $data["IzUsersLogo"]['large_logo_addr'] = $largeLogoName;
            $this->IzUsersLogo->id = $id;
            $this->IzUsersLogo->save($data);
        }
        
        $sImage[0] = $this->IzUsersLogo->logoFile2Url($sImage[0]);
        $sImage[2] = $this->IzUsersLogo->logoFile2Url($sImage[2]);
        //show for test
        //$this->set("userLogo", $sImage);
        $this->Session->setFlash(__('上传头像成功!'));
        $this->redirect('/myprofile');
        exit();
    }

    protected function _uploadImageFile($uid=0) { // Note: GD library is required for this function
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $iWidth = $iHeight = 230; // desired image result dimensions
            $iWidth2 = $iHeight2 = 50; // desired image result dimensions
            $iJpgQuality = 90;
            $maxSize = 1024 * 2 * 1024; //10240 kb
            $path = Configure::read('userLogoPath');
            //$uploadPath = Router::url($path) . "/";
            $path = rtrim($path, "/")."/";
            $uploadPath = ltrim($path, '/');
            $logoFileName = NULL;
            $logoFileName2 = NULL;
    
            if ($_FILES) {
    
                // if no errors and size less than 10240kb
                if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < $maxSize) {
                    if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
    
                        // new unique filename
                        $logoFileName = $this->getFileName($uid);
                        $logoFileName2 = $this->getFileName($uid, "small");
                        $sTempFileName = $uploadPath . $logoFileName;
                        $sTempFileName2 = $uploadPath . $logoFileName2;
    
                        // move uploaded file into cache folder
                        move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
    
                        // change file permission to 644
                        @chmod($sTempFileName, 0644);
    
                        if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                            $aSize = getimagesize($sTempFileName); // try to obtain image info
                            if (!$aSize) {
                                @unlink($sTempFileName);
                                return;
                            }
    
                            // check for image type
                            switch($aSize[2]) {
                                case IMAGETYPE_JPEG:
                                    $sExt = '.jpg';
    
                                    // create a new image from file 
                                    $vImg = @imagecreatefromjpeg($sTempFileName);
                                    break;
                                /*case IMAGETYPE_GIF:
                                    $sExt = '.gif';
    
                                    // create a new image from file 
                                    $vImg = @imagecreatefromgif($sTempFileName);
                                    break;*/
                                case IMAGETYPE_PNG:
                                    $sExt = '.png';
    
                                    // create a new image from file 
                                    $vImg = @imagecreatefrompng($sTempFileName);
                                    break;
                                default:
                                    @unlink($sTempFileName);
                                    return;
                            }
    
                            // create a new true color image
                            $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );
                            $vDstImg2 = @imagecreatetruecolor( $iWidth2, $iHeight2 );
    
                            // copy and resize part of an image with resampling
                            imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);
                            imagecopyresampled($vDstImg2, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth2, $iHeight2, (int)$_POST['w'], (int)$_POST['h']);
    
                            // define a result image filename
                            $sResultFileName = $sTempFileName . $sExt;
                            $sResultFileName2 = $sTempFileName2 . $sExt;
                            $logoFileName .= $sExt;
                            $logoFileName2 .= $sExt;
    
                            // output image to file
                            imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                            imagejpeg($vDstImg2, $sResultFileName2, $iJpgQuality);
                            @unlink($sTempFileName);
    
                            return array($logoFileName2, NULL, $logoFileName);
                        }
                    }
                }
            }
        }
    }

    public function getFileName($uid = 0, $size = 'large') {
        $token = md5(time().rand());
        $dateString = date("YmdHis");
        $fileName = "{$uid}_{$size}_{$dateString}_$token";
        return $fileName;
    }

    public function show() {
        //get my uid;
        //if we have no pics, give default pics
        $uid = $this->UserAuth->getUserId();

        $logos = $this->IzUsersLogo->getUserLogosAddr($uid);

        $smallPath = $this->IzUsersLogo->genLogoUrl($logos['small'], 'small');
        $largePath = $this->IzUsersLogo->genLogoUrl($logos['large'], 'large');
        
        $this->set('smallPath', $smallPath);
        $this->set('largePath', $largePath);
    }

}
