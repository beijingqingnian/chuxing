<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = '出行';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="weui-cells weui-cells_form">

        <?php $form = ActiveForm::begin(['id' => 'travel-form']);?>

        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">出发城市</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="Travel[pre_city]">
                    <?php foreach ($cityList as $k => $city): ?>
                        <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="help-block help-block-error"></p>
            </div>
        </div>


        <?= $form->field($model, 'pre_address', ['inputTemplate' => '<div class="weui-cell">' .
            '<div class="weui-cell__hd"><label class="weui-label">地点</label></div>' .
            '<div class="weui-cell__bd">' .
            '<input class="weui-input" name="Travel[pre_address]" type="text" placeholder="请输入出发地">' .
            '</div>' .
            '</div>'])->label(false); ?>


        <div class="weui-cell weui-cell_select weui-cell_select-after">
            <div class="weui-cell__hd">
                <label for="" class="weui-label">目的城市</label>
            </div>
            <div class="weui-cell__bd">
                <select class="weui-select" name="Travel[to_city]">
                    <?php foreach ($cityList as $k => $city): ?>
                        <option value="<?= $city['id'] ?>"><?= $city['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="help-block help-block-error"></p>
            </div>
        </div>

        <?= $form->field($model, 'to_address', ['inputTemplate' => '<div class="weui-cell">' .
            '<div class="weui-cell__hd"><label class="weui-label">目的地</label></div>' .
            '<div class="weui-cell__bd">' .
            '<input class="weui-input" name="Travel[to_address]" type="text" placeholder="请输入目的地">' .
            '</div>' .
            '</div>'])->label(false); ?>

        <?= $form->field($model, 'go_off_time', ['inputTemplate' => '<div class="weui-cell">' .
            '<div class="weui-cell__hd"><label for="" class="weui-label">出发时间</label></div>' .
            '<div class="weui-cell__bd">' .
            '<input class="weui-input"  name="Travel[go_off_time]" type="datetime-local" value="" placeholder="">' .
            '</div>' .
            '</div>'])->label(false); ?>

        <?= $form->field($model, 'surplus_seat', ['inputTemplate' => '<div class="weui-cell">' .
            '<div class="weui-cell__hd"><label class="weui-label">空余座位</label></div>' .
            '<div class="weui-cell__bd">' .
            '<input class="weui-input" name="Travel[surplus_seat]" type="number" pattern="[0-9]*" placeholder="请输入空余座位">' .
            '</div>' .
            '</div>'])->label(false); ?>

        <?= $form->field($model, 'mobile', ['inputTemplate' => '<div class="weui-cell">' .
            '<div class="weui-cell__hd"><label class="weui-label">手机号</label></div>' .
            '<div class="weui-cell__bd">' .
            '<input class="weui-input" name="Travel[mobile]" type="number" pattern="[0-9]*" placeholder="请输入手机号">' .
            '</div>' .
            '</div>'])->label(false); ?>


        <?/*= $form->field($model, 'verifyCode', ['options' => ['class' => 'weui-cell weui-cell_vcode']])->widget(Captcha::className(), [
            'captchaAction' => '/car-owner/captcha',
            'imageOptions'=>['alt'=>'点击换图','title'=>'点击换图', 'style'=>'cursor:pointer'],
            'options' => ['placeholder' => '请输入验证码', 'class' => 'weui-input', 'name' => 'Travel[verifyCode]'],
            'template' => '<div class="weui-cell__hd"><label class="weui-label">验证码</label></div><div class="weui-cell__bd">{input}</div>' .
                '<div class="weui-cell__ft">{image}</div>',
        ])->label(false); */?>

        <?php ActiveForm::end(); ?>

    </div>
    <div class="weui-cells__tips">绿色出行,安全第一</div>
    <a href="javascript:;" id="show-confirm"
                                                    class="weui-btn weui-btn_primary">发布行程</a>
    <a href="javascript:;"
                                                                                                 id="cancel-trip"
                                                                                                 class="weui-btn weui-btn_warn">关闭行程</a>

<?php $this->beginBlock('confirm') ?>
    $("#travel-verifycode-image").on("click", function(){
    this.src=this.src+"?n="+Math.random();
    });
    $("#show-confirm").click(function(){
    $.confirm("确认发布行程?", "", function() {
    $("#travel-form").submit();
    $.toast("发布成功!");
    }, function() {
    //取消操作
    })
    });
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['confirm']); ?>