package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Usuario;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface UsuariosRepository extends JpaRepository<Usuario, Integer> {
    Usuario getByNif(String nif);
    @Query("select u from Usuario u order by u.createAt desc")
    List<Usuario> findLastRows(Pageable page);
    List<Usuario> findByNif(String nif);
}
