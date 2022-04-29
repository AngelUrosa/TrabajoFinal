package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import org.springframework.security.core.userdetails.UserDetailsService;

import java.util.List;

public interface UsuariosService extends UserDetailsService {
    Usuario save(Usuario usuario);

    Articulo save(Articulo articulo);
    List<Usuario> listAll();
    Usuario getByNif(String nif);
    List<Usuario> listLastRows(int rows);
    void delete(int id);
    List<Usuario> listByNif(String nif);
}
