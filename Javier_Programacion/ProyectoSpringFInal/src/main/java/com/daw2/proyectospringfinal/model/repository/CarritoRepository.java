package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Carrito;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import org.springframework.data.jpa.repository.JpaRepository;

public interface CarritoRepository extends JpaRepository<Carrito, Integer> {

    Carrito findCarritoByUsuarioAndConfirmFalse(Usuario usuario);
}
