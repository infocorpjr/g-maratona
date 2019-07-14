<?php

namespace Tests\Unit\app\Models;

use App\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Os atributos excluídos do formulário JSON do modelo.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'int',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Testa alguns atributos para configuração do model.
     *
     * @return void
     */
    public function test_attributes_configuration()
    {
        // Model
        $model = new User();
        // Assertions
        $this->assertEquals($this->fillable, $model->getFillable());
        $this->assertEquals($this->hidden, $model->getHidden());
        $this->assertEquals($this->casts, $model->getCasts());
    }

    /**
     * Testa o relacionamento entre usuário e ator.
     *
     * @return void
     */
    public function test_has_one_actor_relation()
    {
        // Model
        $user = new User();
        // Assertions
        $this->assertInstanceOf(HasOne::class, $user->actor());
    }

    /**
     * Testa o relacionamento entre usuário e times.
     *
     * @return void
     */
    public function test_has_many_teams_relation()
    {
        // Model
        $user = new User();
        // Assertions
        $this->assertInstanceOf(HasMany::class, $user->teams());
    }
}
