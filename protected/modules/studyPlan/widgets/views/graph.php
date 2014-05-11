<?php
/**
 *
 * @var Graph $this
 * @var array $list
 * @var integer $yearAmount
 */
?>
<style>
    div.result {
        margin-top: 15px;
    }

    div.result img.load {
        display: block;
        width: 32px;
        margin: auto;
    }

    table.graph * {
        text-align: center;
    }

    table.graph tr.numbers th,
    table.graph td {
        padding-left: 0;
        padding-right: 0;
        font-weight: normal;
    }

    table.graph tr.line > td {
        padding: 0;
    }

    table.graph tr.line td > span {
        padding: 0 5px;
    }

    table.graph tr.line > td > input {
        padding: 1px 1px;
        border-radius: 0;
        width: 100%;
        border: none;
        min-width: 16px;
        display: block;
    }
</style>
<script>
    var t = "<?php echo Yii::t('plan','T'); ?>";
    var s = "<?php echo Yii::t('plan','S'); ?>";
    var p = "<?php echo Yii::t('plan','P'); ?>";
    var h = "<?php echo Yii::t('plan','H'); ?>";
    var de = "<?php echo Yii::t('plan','E/D'); ?>";
    var empty = " ";
    $(function () {
        var loader = $('img.load').hide();
        $('tr.line').find('input').click(function () {
            var obj = $(this);
            switch (obj.attr('data-state')) {
                case 'T':
                    obj.val(s);
                    obj.attr('data-state', 'S');
                    break;
                case 'S':
                    obj.val(p);
                    obj.attr('data-state', 'P');
                    break;
                case 'P':
                    obj.val(h);
                    obj.attr('data-state', 'H');
                    break;
                case 'H':
                    obj.val(de);
                    obj.attr('data-state', 'DE');
                    break;
                case 'DE':
                    obj.val(empty);
                    obj.attr('data-state', ' ');
                    break;
                case ' ':
                    obj.val(t);
                    obj.attr('data-state', 'T');
                    break;
            }
        });
        $('#generate').click(function () {
            event.preventDefault();
            $("div.result").fadeOut();
            loader.show();
            var done = function (html) {
                loader.fadeOut();
                $("div.result").empty().append(html).fadeIn();
            }
            var myInputs = $('#graph').find('input').clone();
            myInputs.each(function (i, val) {
                var v = $(val);
                v.attr('type', 'text');
                v.val(v.attr('data-state'));
            });
            var data = $('<form>').append(myInputs).serialize();
            var url = "<?php echo $this->controller->createUrl('/studyPlan/plan/executeGraph');?>";

            // Send the data using post
            var posting = $.post(url, data).done(done);
        });
    });
</script>
<table id="graph" class="graph items table table-striped table-condensed table-bordered table-hover">
    <thead>
    <tr>
        <th rowspan="2"></th>
        <?php
        $amount = 0;
        foreach ($list as $key => $item):
            $amount += $item;
            ?>
            <th colspan="<?php echo $item; ?>"><?php echo Yii::t('base', $key); ?></th>
        <?php endforeach; ?>
    </tr>
    <tr class="numbers">
        <?php for ($i = 0; $i < $amount; $i++): ?>
            <th>
                <?php echo $i + 1; ?>
            </th>
        <?php endfor; ?>
    </tr>
    </thead>
    <tbody>
    <?php for ($j = 0; $j < $yearAmount; $j++): ?>
        <tr class="line">
            <td><span><?php echo $j + 1; ?></span></td>
            <?php for ($i = 0; $i < $amount; $i++): ?>
                <td>
                    <input
                        name="<?php echo "graph[$j][$i]"; ?>"
                        type="button" class="btn"
                        value="<?php echo Yii::t('plan', $map[$j][$i]); ?>"
                        data-state="<?php echo $map[$j][$i]; ?>"/>
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
<span>
    ПОЗНАЧЕННЯ:
</span>
<ul>
    <li><?php echo Yii::t('plan', 'T - theoretical training'); ?></li>
    <li><?php echo Yii::t('plan', 'S - examination session'); ?></li>
    <li><?php echo Yii::t('plan', 'P - practice'); ?></li>
    <li><?php echo Yii::t('plan', 'H - vacation (holidays)'); ?></li>
    <li><?php echo Yii::t('plan', 'E - passing the state exam'); ?></li>
    <li><?php echo Yii::t('plan', 'D - protection degree project (work)'); ?></li>
</ul>
<button class="btn btn-info" id="generate"><?php echo Yii::t('base', 'Generate'); ?></button>
<img class="load" src="/img/loadbar.gif" alt="load"/>
<div class="result">
</div>