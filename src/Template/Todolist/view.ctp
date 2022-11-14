<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist $todolist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Todolist'), ['action' => 'edit', $todolist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Todolist'), ['action' => 'delete', $todolist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Todolist'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Todolist'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="todolist view large-9 medium-8 columns content">
    <h3><?= h($todolist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= h($todolist->person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($todolist->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= h($todolist->priority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($todolist->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= $this->Number->format($todolist->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Versionno') ?></th>
            <td><?= $this->Number->format($todolist->versionno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delflg') ?></th>
            <td><?= $this->Number->format($todolist->delflg) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datetime') ?></th>
            <td><?= h($todolist->datetime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createtime') ?></th>
            <td><?= h($todolist->createtime) ?></td>
        </tr>
    </table>
</div>
