package com.daw2.infoba.service;

import com.daw2.infoba.model.entity.DetalleFactura;
import com.daw2.infoba.model.entity.Factura;

import java.util.List;

public interface FacturasService {
    Factura save(Factura factura);
    List<Factura> listAll();
    Factura getByNumFactura(String numFactura);
    List<Factura> listByNumFactura(String numFactura);
    List<Factura> listByNif(String nif);
    List<Factura> listLastRows(int rows);
    void delete(int id);
    Factura saveWithDetalle(Factura factura);
    Factura updateWithDetalle(Factura factura, List<DetalleFactura> borrados);
    double totalFacturaById(int id);
    void deleteDetalleById(int id);
    void deleteDetalle(List<DetalleFactura> detalleFacturas);
    void disabled(int id, boolean anulada);
    List<Factura> listByAnulada(boolean anulada);
}
