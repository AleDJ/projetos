<?php

class Tarefa
{
	private $pdo;
    
    public $id;
    public $descricao;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM Tarefa");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obter($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM Tarefa WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Excluir($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM Tarefa WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Atualizar($data)
	{
		try 
		{
			$sql = "UPDATE Tarefa SET 
						descricao  = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
				     $data->descricao,
				    $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Tarefa $data)
	{
		try 
		{
		$sql = "INSERT INTO Tarefa (descricao) 
		        VALUES (?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->descricao
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}