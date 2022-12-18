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
        'value' => isset($edit_data['person']) ? $edit_data['person'] : "",
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
    <?= '<label class="wd15p float-l pdr-20">実施期限'; ?>
    <?= $this->Form->input('datetime', [
        'label' => false,
        'type' => 'text',
        'id' => 'txtdatetime',
    ]); ?>
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
    <?= $this->Form->submit('登録', [
        'id' => 'btnRegist'
    ]); ?>

    <?php // フォームの終了 ?>
    <?= $this->Form->end(); ?>

    <?php
        $persons = [0 => '佐藤一郎', 1 => '佐藤二郎', 2 => '佐藤三郎', 3 => '佐藤四郎', 4 => '佐藤五郎'];
        $states = [0 => '未着手', 1 => '進行中', 2 => '解決', 3 => '保留'];
        $prioritys = [0 => '小', 1 => '中', 2 => '大', 3 => '緊急'];
    ?>

    <table>
        <thead>
            <?= $this->Html->tableHeaders(array('タスク', '担当者', '実施期限', '優先度', 'ステータス', '登録日', '', '')) ?>
        </thead>
        <tbody>
            <?php foreach ($datalist as $data): ?>
                <tr>
                    <td><?php echo $data['subject']; ?></td>
                    <td><?php echo $persons[$data['person']]; ?></td>
                    <td><?php echo $data['datetime']; ?></td>
                    <td><?php echo $prioritys[$data['priority']]; ?></td>
                    <td><?php echo $states[$data['state']]; ?></td>
                    <td><?php echo substr($data['crdatetime'], 0, 10); ?></td>
                    <td><?php echo $this->Html->link
                            (
                                '編集',
                                [
                                    'action'=>'edit',$data->id,
                                ],
                                [
                                    'id' => 'edit_btn',
                                ]
                            );
                        ?>
                    </td>
                    <td><?php echo $this->Html->link('削除', [
                        'action'=>'delete',$data['id']],
                        ['id' => 'del_btn',
                    ]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->Html->script('http://code.jquery.com/Jquery-1.11.3.min.js');?>
    <?= $this->Html->script('todolist') ?>

</html>
