/*

package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Proveedor;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import java.util.List;

public interface ProveedoresRepository extends JpaRepository<Proveedor, Integer> {
    Proveedor getByNif(String nif);
    @Query("select p from Proveedor p order by p.createAt desc")
    List<Proveedor> findLastRows(Pageable page);

    List<Proveedor> findByRazonSocialContainingIgnoreCase(String razonSocial);

    List<Proveedor> findByNif(String nif);
}

*/
