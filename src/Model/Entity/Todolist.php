<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Todolist Entity
 *
 * @property int $id
 * @property string|null $subject
 * @property string|null $person
 * @property string|null $state
 * @property string|null $priority
 * @property \Cake\I18n\FrozenDate|null $datetime
 * @property int|null $delflg
 * @property \Cake\I18n\FrozenTime|null $crdatetime
 */
class Todolist extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'subject' => true,
        'person' => true,
        'state' => true,
        'priority' => true,
        'datetime' => true,
        'delflg' => true,
        'crdatetime' => true,
    ];
}
