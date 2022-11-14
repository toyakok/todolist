<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Todolist Entity
 *
 * @property int $id
 * @property int $subject
 * @property string $person
 * @property string $state
 * @property string $priority
 * @property \Cake\I18n\FrozenDate $deadtime
 * @property \Cake\I18n\FrozenDate|null $createtime
 * @property int|null $versionno
 * @property int|null $delflg
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
        'deadtime' => true,
        'createtime' => true,
        'versionno' => true,
        'delflg' => true,
    ];
}
