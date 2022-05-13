package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Carrito;
import com.daw2.proyectospringfinal.model.entity.Usuario;

import java.util.List;

public interface CarritoService{
    Carrito save(Carrito carrito);
    List<Carrito> listAll();
    Carrito getById(int id);
    Carrito notConfirm (Usuario usuario);

}
