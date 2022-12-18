<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist $todolist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $todolist->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Todolist'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="todolist form large-9 medium-8 columns content">
    <?= $this->Form->create($todolist) ?>
    <fieldset>
        <legend><?= __('Edit Todolist') ?></legend>
        <?php
            echo $this->Form->control('subject');
            echo $this->Form->control('person');
            echo $this->Form->control('state');
            echo $this->Form->control('priority');
            echo $this->Form->control('datetime', ['empty' => true]);
            echo $this->Form->control('delflg');
            echo $this->Form->control('crdatetime', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
