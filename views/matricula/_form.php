<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CURSO;
use app\models\TURMA;
use app\models\ALUNO;
use app\models\TIPOALUNO;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\MATRICULA */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matricula-form">

    <?php $form = ActiveForm::begin(); ?>

        <!--<?= $form->field($model, 'MATRICULA_COD_PK')->textInput(['maxlength' => true]) ?>-->


        <?= $form->field($model, 'CURSO_COD_FK')->dropDownList(ArrayHelper::map(CURSO::find()->all(), 
                                                                                    'CURSO_COD_PK', 
                                                                                    'CURSO_NOME'),
                                                                                    [
                                                                                        'prompt'=>'- Selecione - ',
                                                                                        'disabled'=>!($model->isNewRecord),
                                                                                        'onchange'=>'
                                                                                            $.post( "index.php?r=matricula/listar&id='.'"+$(this).val(), function(data){
                                                                                            $.post( "index.php?r=matricula/listar&id='.'"+$(this).val(), function(data){
                                                                                            $.post( "index.php?r=matricula/listar&id='.'"+$(this).val(), function(data){
                                                                                                $( "select#matricula-turma_cod_fk").html(data);
                                                                                            });'
                                                                                    ]) ?>

        <?= $form->field($model, 'TURMA_COD_FK')->dropDownList(ArrayHelper::map(TURMA::find()->all(), 
                                                                                    'TURMA_COD_PK', 
                                                                                    'TURMA_DT_INICIO','TURMA_DT_FIM'),
                                                                                    [
                                                                                        'prompt'=>'- Selecione - ',
                                                                                        'disabled'=>!($model->isNewRecord),
                                                                                    ]) ?>
        <?= $form->field($model, 'ALUNO_COD_FK')->dropDownList(ArrayHelper::map(ALUNO::find()->all(), 
                                                                                    'ALUNO_COD_PK', 
                                                                                    'ALUNO_NOME'),
                                                                                    [
                                                                                        'prompt'=>'- Selecione - ',
                                                                                        'disabled'=>!($model->isNewRecord),

                                                                                    ]) ?> 


        </div>                                                                                
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
