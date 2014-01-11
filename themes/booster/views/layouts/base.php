<?php
/**
 * Base layout
 * @author Dmytro Karpovych <ZAYEC77@gmail.com>
 */
?>
<?php $this->beginContent('//layouts/main'); ?>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    //'type' => 'inverse', // null or 'inverse'
    'brand' => 'HPK',
    'brandUrl' => array('/site/index'),
    'fixed' => 'true',
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
                array('label' => 'Login', 'url' => array('/user/login'), 'visible' => Yii::app()->user->isGuest),
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
        <footer id="footer" class="text-center">
            Copyright &copy; <?php echo date('Y'); ?> by three amigos<br/>
            All Rights Reserved.<br/>
            <?php echo Yii::powered(); ?>
        </footer>
        <!-- footer -->
    </div>

<?php $this->endContent(); ?>