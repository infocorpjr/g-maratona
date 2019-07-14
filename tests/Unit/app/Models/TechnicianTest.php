<?php

namespace Tests\Unit\app\Models;

use Tests\TestCase;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TechnicianTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'marathon_id',
        'validated'
    ];

    /**
     * Os atributos excluídos do formulário JSON do modelo.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'user_id' => 'integer',
        'marathon_id' => 'integer'
    ];

    /**
     * Testa alguns atributos para configuração do model.
     *
     * @return void
     */
    public function test_attributes_configuration()
    {
        // Assertions
        $this->assertEquals($this->fillable, (new Technician())->getFillable());
        $this->assertEquals($this->hidden, (new Technician())->getHidden());
        $this->assertEquals($this->casts, (new Technician())->getCasts());
    }

    /**
     * Testa o relacionamento entre técnico e usuário.
     *
     * @return void
     */
    public function test_belongs_to_user_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Technician())->user());
    }

    /**
     * Testa o relacionamento entre técnico e maratona.
     *
     * @return void
     */
    public function test_belongs_to_marathon_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Technician())->marathon());
    }
}