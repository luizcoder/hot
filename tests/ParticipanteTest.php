<?php


use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipanteTest extends TestCase
{
    
    use WithoutMiddleware,DatabaseTransactions;
    
    /**
     * Participante para os testes
     */
    protected $participante =  ['nome' => 'Alfredo Neves', 'email' => 'alfredo@exemplo.com', 'cpf' =>'111.111.111-11','telefone' => '(11) 1112-3214'];
    
    /**
     * Testando cadastro de usuários
     *
     * @return void
     */
    public function testCadastro()
    {       
        $this->post('/participante', $this->participante)
        ->seeJson(['created' => true]);
    }
    
    
    
}


?>