<?php

namespace Tests\Unit\app\Models;

use Tests\TestCase;
use App\Models\Team;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'marathon_id',
        'name',
        'description',
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
        $this->assertEquals($this->fillable, (new Team())->getFillable());
        $this->assertEquals($this->hidden, (new Team())->getHidden());
        $this->assertEquals($this->casts, (new Team())->getCasts());
    }

    /**
     * Testa o relacionamento entre time e usuário.
     *
     * @return void
     */
    public function test_belongs_to_user_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Team())->user());
    }

    /**
     * Testa o relacionamento entre time e maratona.
     *
     * @return void
     */
    public function test_belongs_to_marathon_relation()
    {
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, (new Team())->marathon());
    }

    /**
     * Testa o relacionamento entre time e maratona.
     *
     * @return void
     */
    public function test_has_many_participants_relation()
    {
        // Assertions
        $this->assertInstanceOf(HasMany::class, (new Team())->participants());
    }
}