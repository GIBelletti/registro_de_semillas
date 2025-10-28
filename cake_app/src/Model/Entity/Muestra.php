<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Muestra Entity
 *
 * @property string $codigo_de_muestra
 * @property string $especie
 * @property int $numero_de_presinto
 * @property string $empresa
 * @property int $cantidad_de_semillas
 * @property DateTime $fecha_resgistro
 * @property DateTime $fecha_modificado
 * @property DateTime $fecha_extraccion
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
        'fecha_modificado' => true,
        'fecha_extraccion' => true,
    ];

    public function set_codigo_de_muestra()
    {
        $initial_code = strtoupper($this->especie);
        $this->codigo_de_muestra = $initial_code . "-" . uniqid();
    }
}
