<?php


namespace Tests\Unit\app\Models;

use Tests\TestCase;
use App\Models\Actor;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActorTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'is_administrator',
        'is_technician',
        'is_voluntary',
        'is_participant',
    ];

    /**
     * Os atributos excluídos do formulário JSON do modelo.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'user_id'
    ];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'is_administrator' => 'boolean',
        'is_technician' => 'boolean',
        'is_voluntary' => 'boolean',
        'is_participant' => 'boolean',
    ];

    /**
     * Testa alguns atributos para configuração do model.
     *
     * @return void
     */
    public function test_attributes_configuration()
    {
        // Model
        $model = new Actor();
        // Assertions
        $this->assertEquals($this->fillable, $model->getFillable());
        $this->assertEquals($this->hidden, $model->getHidden());
        $this->assertEquals($this->casts, $model->getCasts());
    }

    /**
     * Testa o relacionamento entre ator e usuário.
     *
     * @return void
     */
    public function test_belongs_to_user_relation()
    {
        // Model
        $model = new Actor();
        // Assertions
        $this->assertInstanceOf(BelongsTo::class, $model->user());
    }
}