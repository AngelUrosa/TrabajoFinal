package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Articulo;
import com.daw2.proyectospringfinal.model.entity.Usuario;
import org.springframework.security.core.userdetails.UserDetailsService;

public interface UsuariosService  extends UserDetailsService {
    Usuario findByUsername(String username);

}
