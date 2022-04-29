package com.daw2.infoba.model.repository;

import com.daw2.infoba.model.entity.Usuario;
import org.springframework.data.repository.CrudRepository;

public interface UsuariosRepository extends CrudRepository<Usuario, Integer> {
    Usuario findByUsername(String username);
}
