package com.daw2.aprende.model.dao;


import com.daw2.aprende.model.entity.Usuario;

public interface UsuariosDao extends Dao<Usuario, Integer> {
    Usuario getByNif(String nif);
}
