<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Bookmark> $bookmarks
 */
?>
<div class="bookmarks index content">
    <?= $this->Html->link(__('new bookmark'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('bookmarks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookmarks as $bookmark): ?>
                <tr>
                    <td><?= $this->Number->format($bookmark->id) ?></td>
                    <td><?= $bookmark->has('user') ? $this->Html->link($bookmark->user->email, ['controller' => 'Users', 'action' => 'view', $bookmark->user->id]) : '' ?></td>
                    <td><?= h($bookmark->title) ?></td>
                    <td><?= h($bookmark->created) ?></td>
                    <td><?= h($bookmark->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('view'), ['action' => 'view', $bookmark->id]) ?>
                        <?= $this->Html->link(__('edit'), ['action' => 'edit', $bookmark->id]) ?>
                        <?= $this->Form->postLink(__('delete'), ['action' => 'delete', $bookmark->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookmark->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primer pagina')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultima pagina') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('pagina {{page}} de {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
