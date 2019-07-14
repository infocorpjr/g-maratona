<?php

namespace Tests\Unit\app\Models;

use Tests\TestCase;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParticipantTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'team_id',
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
        'team_id' => 'integer'
    ];

    /**
     * Testa alguns atributos para configuração do model.
     *
     * @return void
     */
    public function test_attributes_configuration()
    {
        // Assertions
        $this->assertEquals($this->fillable, (new Participant())->getFillable());
        $this->assertEquals($this->hidden, (new Participant())->getHidden());
        $this->assertEquals($this->casts, (new Participant())->getCasts());
    }

    /**
     * Testa o relacionamento entre participante e usuário.
     *
     * @return void
     */
    public function test_belongs_to_user_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Participant())->user());
    }

    /**
     * Testa o relacionamento entre participante e time.
     *
     * @return void
     */
    public function test_belongs_to_team_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Participant())->team());
    }
}