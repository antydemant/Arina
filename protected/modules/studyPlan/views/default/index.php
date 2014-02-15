<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
    This is the view content for action "<?php echo $this->action->id; ?>".
    The action belongs to the controller "<?php echo get_class($this); ?>"
    in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
    You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>

<div id='form'>
<?php echo TbHtml::dropDownList('speciality', '', TbHtml::listData(Speciality::model()->findAll(), 'id', 'title'), array('empty' => 'Оберіть спеціальність')); ?>
<span id="plan_form" style="margin-left: 20px" ></span>
</div>
<script>

    $('#speciality').change(
        function () {
            var id = $('#speciality option:selected').attr('value');
            if (id != '') {
                $.ajax({
                    url: "<?php echo $this->createUrl('plan'); ?>/" + id,
                    success: function (data) {
                        $('#plan_form').html(data);
                        //html(data);
                    }
                });
            } else {
                $('plan_form').html('');
            }

        }
    );
    $('#plan').change(
        function() {
            alert('plan changed');
        }
    );
</script>