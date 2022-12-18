<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Todolist[]|\Cake\Collection\CollectionInterface $todolist
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Todolist'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="todolist index large-9 medium-8 columns content">
    <h3><?= __('Todolist') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datetime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delflg') ?></th>
                <th scope="col"><?= $this->Paginator->sort('crdatetime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todolist as $todolist): ?>
            <tr>
                <td><?= $this->Number->format($todolist->id) ?></td>
                <td><?= h($todolist->subject) ?></td>
                <td><?= h($todolist->person) ?></td>
                <td><?= h($todolist->state) ?></td>
                <td><?= h($todolist->priority) ?></td>
                <td><?= h($todolist->datetime) ?></td>
                <td><?= $this->Number->format($todolist->delflg) ?></td>
                <td><?= h($todolist->crdatetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $todolist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $todolist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $todolist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todolist->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
