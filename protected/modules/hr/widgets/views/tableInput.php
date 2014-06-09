<?php
/**
 * @var $this TableInput
 * @var $this ->model Employee
 * @author Volodymyr Gamula <v.gamula@gmail.com>
 */


?>

</br>
<?php echo CHtml::activeTextArea($this->model, $this->name, array('id' => $this->name, 'style' => 'display: none')); ?>

<label for="<?= $this->name ?>_input">
    <h6>
        <?php
        $label = $this->model->attributeLabels();
        echo $label[$this->name];
        ?>
    </h6>
</label>
<select id="<?= $this->name ?>_select" multiple class="form-control">
</select>
</br>
<?php foreach ($this->fields as $key => $value): ?>
    <label for="<?= $this->name ?>_field_<?= $key ?>">
        <?= $value ?>
    </label>
    <input type="text" id="<?= $this->name ?>_field_<?= $key ?>">
    </br>
<?php endforeach; ?>
<button id="<?= $this->name ?>_add_btn"><?= Yii::t('base', 'Add') ?></button>
<button id="<?= $this->name ?>_remove_btn"><?= Yii::t('base', 'Remove') ?></button>
<script>

    var <?= $this->name ?>_add = function () {
        var values = [];
        $("#<?= $this->name ?>_select option").each(function () {
            values.push($(this).text());
        });
        $("#<?= $this->name ?>").val(values.join('|'));
    };

    var <?= $this->name ?>_clear = function () {
        <?php foreach ($this->fields as $key => $value): ?>
        $("#<?= $this->name ?>_field_<?= $key ?>").val('');
        <?php endforeach;?>
    };

    $("#<?= $this->name?>_add_btn").click(function (event) {
        var value = [];
        <?php foreach ($this->fields as $key => $value): ?>
        value.push($("#<?= $this->name ?>_field_<?= $key ?>").val());
        <?php endforeach; ?>
        $("#<?= $this->name?>_input").val();

        $("#<?= $this->name ?>_select").append(
            $("<option></option>").text(value.join(', ')));

        <?= $this->name ?>_add();
        <?= $this->name ?>_clear();
        event.preventDefault();
    });

    $("#<?= $this->name?>_remove_btn").click(function (event) {
        $("#<?= $this->name ?>_select option:selected").remove();
        <?= $this->name ?>_add();
        <?= $this->name ?>_clear();
        event.preventDefault();
    });

</script>