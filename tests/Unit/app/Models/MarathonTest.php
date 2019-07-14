<?php

namespace Tests\Unit\app\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use App\Models\Marathon;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class MarathonTest extends TestCase
{
    /**
     * Os atributos que são atribuíveis em massa
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'starts',
        'ends',
        'date',
        'team_count',
        'team_members_count'
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
    ];

    /**
     * Testa alguns atributos para configuração do model.
     *
     * @return void
     */
    public function test_attributes_configuration()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertEquals($this->fillable, $model->getFillable());
        $this->assertEquals($this->hidden, $model->getHidden());
        $this->assertEquals($this->casts, $model->getCasts());
    }

    /**
     * Testa o setter do atributo starts.
     *
     * @return void
     */
    public function test_set_starts_attribute()
    {
        // O model
        $model = new Marathon();
        // Testa a conversão da data para o formato aceito pelo banco de dados.
        $model->setStartsAttribute('14/07/2019 02:06');
        $this->assertInstanceOf(Carbon::class, $model->getAttribute('starts'));
        $this->assertEquals($model->getAttribute('starts')->format('d/m/Y H:i'), '14/07/2019 02:06');
    }

    /**
     * Testa o setter do atributo ends.
     *
     * @return void
     */
    public function test_set_ends_attribute()
    {
        // O model
        $model = new Marathon();
        // Testa a conversão da data para o formato aceito pelo banco de dados.
        $model->setEndsAttribute('14/07/2019 02:06');
        $this->assertInstanceOf(Carbon::class, $model->getAttribute('ends'));
        $this->assertEquals($model->getAttribute('ends')->format('d/m/Y H:i'), '14/07/2019 02:06');
    }

    /**
     * Testa o setter do atributo date.
     *
     * @return void
     */
    public function test_set_date_attribute()
    {
        // O model
        $model = new Marathon();
        // Testa a conversão da data para o formato aceito pelo banco de dados.
        $model->setDateAttribute('14/07/2019 02:06');
        $this->assertInstanceOf(Carbon::class, $model->getAttribute('date'));
        $this->assertEquals($model->getAttribute('date')->format('d/m/Y H:i'), '14/07/2019 02:06');
    }

    /**
     * Testa o getter do atributo starts.
     *
     * @return void
     */
    public function test_get_starts_attribute()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(Carbon::class, $model->getStartsAttribute('2019-07-14 01:56'));
    }

    /**
     * Testa o getter do atributo ends.
     *
     * @return void
     */
    public function test_get_ends_attribute()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(Carbon::class, $model->getEndsAttribute('2019-07-14 01:56'));
    }

    /**
     * Testa o getter do atributo date.
     *
     * @return void
     */
    public function test_get_date_attribute()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(Carbon::class, $model->getDateAttribute('2019-07-14 01:56'));
    }

    /**
     * Testa o relacionamento entre maratona e imagem.
     *
     * @return void
     */
    public function test_morph_many_images_relation()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(MorphMany::class, $model->images());
    }

    /**
     * Testa o relacionamento entre maratona e time.
     *
     * @return void
     */
    public function test_has_many_teams_relation()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(HasMany::class, $model->teams());
    }

    /**
     * Testa o relacionamento entre maratona e técnico.
     *
     * @return void
     */
    public function test_has_many_technicians_relation()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(HasMany::class, $model->technicians());
    }

    /**
     * Testa o relacionamento entre maratona e voluntários.
     *
     * @return void
     */
    public function test_has_many_voluntaries_relation()
    {
        // Model
        $model = new Marathon();
        // Assertions
        $this->assertInstanceOf(HasMany::class, $model->voluntaries());
    }
}
