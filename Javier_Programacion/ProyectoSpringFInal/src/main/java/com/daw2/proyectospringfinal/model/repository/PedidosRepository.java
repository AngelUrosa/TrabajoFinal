package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Pedido;
import org.springframework.data.jpa.repository.JpaRepository;

import java.util.List;

public interface PedidosRepository extends JpaRepository<Pedido, Integer> {




}
