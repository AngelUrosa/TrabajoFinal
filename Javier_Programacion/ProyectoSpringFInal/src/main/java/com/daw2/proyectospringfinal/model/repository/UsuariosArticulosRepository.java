package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.ArticulosUsuarios;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import org.springframework.data.repository.CrudRepository;

import java.util.List;

public interface UsuariosArticulosRepository extends CrudRepository<ArticulosUsuarios, Integer> {

    List<ArticulosUsuarios> getAllByUsuario(Usuario usuario);

    ArticulosUsuarios getAllByUsuarioAndArticulo (Usuario usuario, Articulo articulo);


}
