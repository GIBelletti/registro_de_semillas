<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Muestra Entity
 *
 * @property int $codigo_de_muestra
 * @property string $especie
 * @property int $numero_de_presinto
 * @property string $empresa
 * @property int|null $cantidad_de_semillas
 */
class Muestra extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'especie' => true,
        'numero_de_presinto' => true,
        'empresa' => true,
        'cantidad_de_semillas' => true,
    ];
}
