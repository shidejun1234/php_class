<?php
//图片水印类
class Watermark {
  public function getImg($bigImgPath,$qCodePath,$position){
    $bigImg = imagecreatefromstring(file_get_contents($bigImgPath));
    $qCodeImg = imagecreatefromstring(file_get_contents($qCodePath));

    list($qCodeWidth, $qCodeHight, $qCodeType) = getimagesize($qCodePath);
    list($bigWidth, $bigHight, $bigType) = getimagesize($bigImgPath);

    switch ($position) {
      case '1':
      imagecopymerge($bigImg, $qCodeImg, 0, 0, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '2':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth/2-$qCodeWidth/2, 0, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '3':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth-$qCodeWidth, 0, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '4':
      imagecopymerge($bigImg, $qCodeImg, 0, $bigHight/2-$qCodeHight/2, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '5':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth/2-$qCodeWidth/2, $bigHight/2-$qCodeHight/2, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '6':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth-$qCodeWidth, $bigHight/2-$qCodeHight/2, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '7':
      imagecopymerge($bigImg, $qCodeImg, 0, $bigHight-$qCodeHight, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '8':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth/2-$qCodeWidth/2, $bigHight-$qCodeHight, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      case '9':
      imagecopymerge($bigImg, $qCodeImg, $bigWidth-$qCodeWidth, $bigHight-$qCodeHight, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
      default:
      imagecopymerge($bigImg, $qCodeImg, $bigWidth-$qCodeWidth, $bigHight-$qCodeHight, 0, 0, $qCodeWidth, $qCodeHight, 100);
      break;
    }

    switch ($bigType) {
        case 1: //gif
        header('Content-Type:image/gif');
        imagegif($bigImg);
        break;
        case 2: //jpg
        header('Content-Type:image/jpg');
        imagejpeg($bigImg);
        break;
        case 3: //png
        header('Content-Type:image/png');
        imagepng($bigImg);
        break;
        default:
            # code...
        break;
      }
    }
  }

  ?>