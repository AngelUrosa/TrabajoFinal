package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Cliente;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface ClientesRepository extends JpaRepository<Cliente, Integer> {
    Cliente getByNif(String nif);
    @Query("select c from Cliente c order by c.createAt desc")
    List<Cliente> findLastRows(Pageable page);
    List<Cliente> findByRazonSocialContainingIgnoreCase(String razonSocial);
    List<Cliente> findByNif(String nif);
}
