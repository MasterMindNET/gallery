<?php

// available params:
// $file;
// $height;
// $width;
// $htmlConf;


use \humhub\modules\gallery\libs\FileUtils;
use \yii\helpers\Html;

$ext = $file->baseFile->getExtension();
$fileType = FileUtils::getItemTypeByExt($ext);
$iconClass = FileUtils::getIconClassByExt($ext);
$title = Html::encode($file->getTitle());
?>
<?php if ($fileType == 'image'): ?>
    <a href="<?php echo $file->getUrl(); ?>" 
       data-type="image" 
       data-toggle="lightbox" 
       data-footer="<button type='button'
       class='btn btn-primary' 
       data-dismiss='modal'>
       <?php echo Yii::t('CfilesModule.base', 'Schließen') ?>
       </button>"

       <?php
       foreach ($htmlConf as $key => $val):
           echo $key . '="' . $val . '"';
       endforeach;
       ?>>
        <img src="<?php echo ($width > 0 && $height > 0 ? $file->baseFile->getPreviewImageUrl($width, $height) : $file->getUrl()); ?>">
    </a>
<?php else: ?>
    <a href="<?php echo $file->getUrl(true); ?>" 
    <?php
    foreach ($htmlConf as $key => $val):
        echo $key . '="' . $val . '"';
    endforeach;
    ?>>
        <span><i class="fa fa-cloud-download fa-fw"></i><span>&nbsp;<?php echo Yii::t('CfilesModule.base', 'Download') ?></span></span>
    </a>
<?php endif; ?>
<h5>
    <i class="fa <?php echo $iconClass; ?> fa-fw"></i><span>&nbsp;<?php echo $title; ?></span>
</h5>