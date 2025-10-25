<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resultados Model
 *
 * @method \App\Model\Entity\Resultado newEmptyEntity()
 * @method \App\Model\Entity\Resultado newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resultado get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Resultado findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Resultado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Resultado> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resultado|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Resultado saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Resultado>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Resultado> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ResultadosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('resultados');
        $this->setDisplayField('codigo_de_muestra');
        $this->setPrimaryKey('codigo_de_muestra');

        $this->belongsTo('Muestras', [
            'foreignKey' => 'codigo_de_muestra',
            'bindingKey' => 'codigo_de_muestra',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('codigo_de_muestra', 'Debe ser un número entero')
            ->requirePresence('codigo_de_muestra', 'create', 'El campo id es obligatorio')
            ->notEmptyString('codigo_de_muestra', 'Debe asociarse a un ítem existente');

        $validator
            ->numeric('poder_germinativo')
            ->requirePresence('poder_germinativo', 'create')
            ->notEmptyString('poder_germinativo');

        $validator
            ->numeric('pureza')
            ->requirePresence('pureza', 'create')
            ->notEmptyString('pureza');

        $validator
            ->scalar('materiales_inertes')
            ->maxLength('materiales_inertes', 4294967295)
            ->requirePresence('materiales_inertes', 'create')
            //->notEmptyString('materiales_inertes');
            ->allowEmptyString('materiales_inertes');

        return $validator;
    }

    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // Asegura que el item_id exista en la tabla items
        $rules->add($rules->existsIn(['codigo_de_muestra'], 'Muestras', 'El /"codigo de muestra/" seleccionado no existe.'));

        return $rules;
    }
}
