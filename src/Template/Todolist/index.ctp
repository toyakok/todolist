<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TodoList</title>
        <?php
        // ajax送信用のJavaSriptを読み込み
        echo $this->Html->script('http://code.jquery.com/jquery-1.11.3.min.js');
        //echo $this->Html->script('todolist.js');
        echo $this->Html->script($ajax_name);
        ?>
    </head>

    <?php //common.cssの読み込み ?>
    <?=  $this->Html->css('common'); ?>

    <?php // フォームの作成 ?>
    <?php //<?= $this->Form->create('todolist', ['url' => ['action' => 'add']]); ?>
    <?= $this->Form->create("null",["type"=> "post"]);?>

    <?php // タスクテキストボックス ?>
    <?= '<label class="wd30p mg0 float-l pdl-30">タスク'; ?>
    <?= $this->Form->contorol('subject', [
        'type' => 'text',
        'id' => 'txtSubject',
    ]); ?>
    <?= '</label>'; ?>

    <?php // 担当者セレクトボックス ?>
    <?= '<label class="wd15p mg0 float-l pdl-20 pdr-20">担当者'; ?>
    <?= $this->Form->input('person', [
        'type' => 'select',
        'label' => false,
        'options' => $persons,
        'id' => 'selectPerson',
    ]); ?>
    <?= '</label>'; ?>

    <?php // 期限選択 ?>
    <?= '<label class="wd15p float-l">実施期限'; ?>
    <?= $this->Form->input('datetime', array(
        'label' => false,
        'type' => 'date',
        'dateFormat' => 'YMD',
        'monthNames' => false,
        'minYear' => date('Y') - 0,
        'maxYear' => date('Y') + 5,
        'id' => 'dateDeadtime',
    )); ?>
    <?= '</label>'; ?>

    <?php // 優先度選択セレクトボックス ?>
    <?= '<label class="wd5p mg0 float-l">優先度'; ?>
    <?= $this->Form->input('priority', [
        'label' => false,
        'type' => 'select',
        'options' => $priority,
        'id' => 'selectPriority',
    ]); ?>
    <?= '</label>'; ?>

    <?php // ステータス選択セレクトボックス ?>
    <?= '<label class="wd10p mg0 float-l pdl-20 pdr-20">ステータス'; ?>
    <?= $this->Form->input('state', [
        'label' => false,
        'type' => 'select',
        'options' => $state,
        'id' => 'selectState',
    ]); ?>
    <?= '</label>'; ?>

    <?php // 登録ボタン ?>
    <?= '<label> '; ?>
    <?= $this->Form->submit('登録', [
        'id' => 'btnRegist'
    ]); ?>
    <?php '</label>'; ?>

    <?php // フォームの終了 ?>
    <?= $this->Form->end(); ?>

    <?= $this->Html->script('http://code.jquery.com/Jquery-1.11.3.min.js');?>
    <?= $this->Html->script('todolist') ?>

</html>
