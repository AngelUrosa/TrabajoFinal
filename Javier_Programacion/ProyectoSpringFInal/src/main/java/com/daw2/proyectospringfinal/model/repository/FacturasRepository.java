package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.Factura;
import org.springframework.data.domain.Pageable;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;

public interface FacturasRepository extends JpaRepository<Factura, Integer> {
    Factura getByNumFactura(String numFactura);
    List<Factura> findByNumFactura(String numFactura);
    @Query("select f from Factura f order by f.numFactura desc")
    List<Factura> findLastRows(Pageable page);
    @Query("select f from Factura f where f.cliente.nif=:nif order by f.numFactura desc")
    List<Factura> findByNif(String nif);
    List<Factura> findByAnulada(boolean anulada);
}
