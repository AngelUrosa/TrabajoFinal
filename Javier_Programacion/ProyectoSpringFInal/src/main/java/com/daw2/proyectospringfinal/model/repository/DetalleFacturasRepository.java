package com.daw2.proyectospringfinal.model.repository;

import com.daw2.proyectospringfinal.model.entity.DetalleFactura;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

public interface DetalleFacturasRepository extends JpaRepository<DetalleFactura, Integer> {
    @Query("SELECT sum((d.precio*d.unidades)*(1-d.dto/100)) FROM DetalleFactura d WHERE d.factura.id=?1 ")
    Double totalFactura(int id);
}
