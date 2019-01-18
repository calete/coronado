<?php

use yii\db\Migration;

/**
 * Class m190118_221634_init
 */
class m190118_221634_init extends Migration
{
    public function up()
    {
        $this->createTable('clientes', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string()->notNull(),
        ]);

        $this->insert('clientes', [
            'id' => 1,
            'nombre' => 'cliente a'
        ]);

        $this->insert('clientes', [
            'id' => 2,
            'nombre' => 'cliente b'
        ]);

        $this->insert('clientes', [
            'id' => 3,
            'nombre' => 'cliente c'
        ]);

        $this->insert('clientes', [
            'id' => 4,
            'nombre' => 'cliente d'
        ]);

        $this->createTable('usuarios', [
            'id' => $this->primaryKey(),
            'cliente_id' => $this->integer()->comment('Cliente'),
            'nombres' => $this->string()->notNull(),
            'apellidos' => $this->string()->notNull()
        ]);

        $this->addForeignKey('fk1_usuarios', 'usuarios', 'cliente_id', 'clientes', 'id', 'RESTRICT', 'CASCADE');

        $this->insert('usuarios', [
            'cliente_id' => 1,
            'nombres' => 'usuario a',
            'apellidos' => 'apellido'
        ]);

        $this->insert('usuarios', [
            'cliente_id' => 1,
            'nombres' => 'usuario b',
            'apellidos' => 'apellido'
        ]);

        $this->insert('usuarios', [
            'cliente_id' => 2,
            'nombres' => 'usuario c',
            'apellidos' => 'apellido'
        ]);

        $this->insert('usuarios', [
            'cliente_id' => 3,
            'nombres' => 'usuario d',
            'apellidos' => 'apellido'
        ]);

        $this->createTable('attach', [
            'id' => $this->primaryKey(),
            'usuario_id' => $this->integer()->notNull(),
            'data' => $this->binary()->notNull(),
            'type' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('fk1_attach', 'attach', 'usuario_id', 'usuarios', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('attach');
        $this->dropTable('usuarios');
        $this->dropTable('clientes');
    }
}
