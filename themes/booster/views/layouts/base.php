<?php
/**
 * Base layout
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<?php $this->beginContent('//layouts/main'); ?>

<?php $this->widget(Booster::NAVIGATOR, array(
    //'type' => 'inverse', // null or 'inverse' //comment
    //'brand' => 'KhPK',
    'brand' => '@',
    'brandUrl' => array('/site/index'),
    'fixed' => 'true',
    'collapse' => true, // requires bootstrap-responsive.css
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => Yii::app()->getUser()->getMainMenu(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => Yii::t('base', 'Log in'), 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest, 'icon' => 'ok'),
                array('label' => Yii::t('base', 'Logout'), 'url' => array('/user/logout'), 'visible' => !Yii::app()->user->isGuest, 'icon' => 'off'),
            ),
        ),
    ),
)); ?>
<!-- mainmenu -->
<div class="container">

    <?php
        $this->widget(Booster::ALERT, array(
            'alerts' => array(
                'success',
                'info',
                'warning',
                'error',
                'danger',
            ),
        ));
    ?>
    <!-- alerts -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php if (isset($this->menu)): ?>
        <header>
            <?php  $this->widget(Booster::BUTTON_GROUP, array(
                'buttons' => $this->menu,
            ));?>
        </header><!-- menu -->
    <?php endif ?>

    <?php echo $content; ?>
    <hr/>
    <footer id="footer" class="text-center">
        Copyright &copy; <?php echo date('Y'); ?> by three amigos<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
        <?php if (YII_DEBUG): ?>
            <br/>
            Час виконання: <?php echo sprintf('%0.5f', Yii::getLogger()->getExecutionTime()) ?> с.
            <br/>
            Використано пам’яті: <?php echo round(memory_get_peak_usage() / (1024 * 1024), 2) . "MB" ?>
        <?php endif; ?>
    </footer>
    <!-- footer -->
</div>

<?php $this->endContent(); ?>
