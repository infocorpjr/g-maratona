<?php

namespace Tests\Unit\app\Models;

use Tests\TestCase;
use App\Models\Voluntary;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoluntaryTest extends TestCase
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
        $this->assertEquals($this->fillable, (new Voluntary())->getFillable());
        $this->assertEquals($this->hidden, (new Voluntary())->getHidden());
        $this->assertEquals($this->casts, (new Voluntary())->getCasts());
    }

    /**
     * Testa o relacionamento entre voluntário e usuário.
     *
     * @return void
     */
    public function test_belongs_to_user_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Voluntary())->user());
    }

    /**
     * Testa o relacionamento entre voluntário e maratona.
     *
     * @return void
     */
    public function test_belongs_to_marathon_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Voluntary())->marathon());
    }
}