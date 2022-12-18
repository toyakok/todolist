<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist $todolist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <?php //<li><?= $this->Form->postLink(
                //__('Delete'),
                //['action' => 'delete', $data->id],
                //['confirm' => __('Are you sure you want to delete # {0}?', $data->id)]
            //)
        ?></li>
        <li><?= $this->Html->link(__('List Todolist'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="todolist form large-9 medium-8 columns content">
    <?= $this->Form->create($todolist) ?>
    <?php //<?= $this->Form->create("null",["type"=> "post"]);?>
    <fieldset>
        <?php //<legend><?= __('Edit Todolist') ?></legend>
        <?php
            echo '<label>担当者';
            echo $this->Form->control('subject');
            echo '</label>';

            echo '<label>担当者';
            echo $this->Form->control('person', [
                'type' => 'select',
                'label' => false,
                'options' => $persons,
            ]);
            echo'</label>';

            echo '<label>実施期限';
            echo $this->Form->control('datetime', [
                'label' => false,
                'type' => 'text',
            ]);
            echo '</label>';

            echo '<label>優先度';
            echo $this->Form->control('priority', [
                'type' => 'select',
                'label' => false,
                'options' => $priority,
            ]);
            echo'</label>';

            echo '<label>ステータス';
            echo $this->Form->control('state', [
                'type' => 'select',
                'label' => false,
                'options' => $state,
            ]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
