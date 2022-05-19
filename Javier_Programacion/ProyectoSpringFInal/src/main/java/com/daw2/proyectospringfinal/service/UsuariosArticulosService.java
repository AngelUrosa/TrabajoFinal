package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.ArticulosUsuarios;
import com.daw2.proyectospringfinal.model.entity.Usuario;

import java.util.List;

public interface UsuariosArticulosService{
    List<ArticulosUsuarios> getAllByUsuario(Usuario usuario);

    void add(Usuario usuario, Articulo articulo);

}
