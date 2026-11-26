<?php

namespace App\Services;
use App\Interfaces\ProductoInterface;



class ProductoService 

{
    
protected ProductoInterface $productoInterface;

    public function __construct(ProductoInterface $productoInterface)
    {
        $this->productoInterface = $productoInterface;
    }

    public function getAll()
    {
        return $this->productoInterface->getAll();
    }

    public function getById(int $id)
    {
        return $this->productoInterface->getById($id);
    }

    public function create(array $data)
    {
        return $this->productoInterface->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->productoInterface->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->productoInterface->delete($id);
    }

    public function findByCodigo(string $codigo)
    {
        return $this->productoInterface->findByCodigo($codigo);
    }

    public function findByEstado(string $estado)
    {
        return $this->productoInterface->findByEstado($estado);
    }

    public function findByDescripcion(string $descripcion)
    {
        return $this->productoInterface->findByDescripcion($descripcion);
    }

    public function getStock(int $stock)
    {
        return $this->productoInterface->getStock($stock);
    }

}
