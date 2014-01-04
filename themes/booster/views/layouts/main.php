<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>

    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" type="image/x-icon"/>
    <!-- blueprint CSS framework -->
    <?php echo Yii::app()->bootstrap->registerBootstrapCss(); ?>
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css"
          media="screen, projection"/>
    <![endif]-->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
</head>

<body>

<div class="container" id="page">
    <?php $this->widget('bootstrap.widgets.TbNavbar', array(
        'type' => 'inverse', // null or 'inverse'
        'brand' => 'MWA',
        'brandUrl' => array('/site/index'),
        'fixed' => '',
        'collapse' => true, // requires bootstrap-responsive.css
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Home', 'url' => array('/site/index')),
                ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => 'Register', 'url' => array('/site/register'), 'visible' => Yii::app()->user->isGuest),

                   /* array('label' => 'Cabinet', 'url' => '#', 'visible' => !Yii::app()->user->isGuest, 'items' => array(
                        array('label' => 'Users', 'url' => '#', 'visible' => Yii::app()->user->role == User::ROLE_ADMIN, 'items' =>
                            array(
                                array('label' => 'List', 'url' => array('/user/admin')),
                                array('label' => 'Create new', 'url' => array('/user/create')),
                            )
                        ),
                        array('label' => 'Albums', 'url' => '#', 'items' =>
                            array(
                                array('label' => 'List', 'url' => array('/album/admin')),
                                array('label' => 'Create new', 'url' => array('/album/create')),
                            )
                        ),
                        '---',
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                    )),*/
                ),
            ),
        ),
    )); ?>
    <!-- mainmenu -->
    <div class="container">
        <?php if (isset($this->breadcrumbs)): ?>
            <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
        <?php endif ?>

        <?php echo $content; ?>
        <hr/>
        <div id="footer">
            Copyright &copy; <?php echo date('Y'); ?> by Dmytro Karpovych<br/>
            All Rights Reserved.<br/>
            <?php echo Yii::powered(); ?>
        </div>
        <!-- footer -->
    </div>
</div>
<!-- page -->
</body>
<style>
    #imgFull {
        cursor: pointer;
    }
    #viewer {
        position: fixed;
        top:0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 300;
        display: none;
        background: rgba(127,127,127,0.3);
    }
    #viewer img {
        position: fixed;
        border: 3px solid #ffffff;
        border-radius: 3px;
        top: 2%;
        left: 20%;
        cursor: pointer;
        max-width: 800px;
        max-height: 800px;
        margin: 20px;
    }
    .error {
        color: red;
    }
</style>
<script>
    $('img.img-polaroid').click(function() {
            $("#bImg").attr("src",$(this).attr("src")).click( function(){$(this).parent().hide();});
            $("#viewer").show();
        }
    )
</script>
<div id="viewer">
    <img id="bImg"/>
</div>
</html>
