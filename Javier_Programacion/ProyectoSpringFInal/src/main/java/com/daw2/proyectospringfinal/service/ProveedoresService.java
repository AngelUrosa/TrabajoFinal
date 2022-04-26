package com.daw2.proyectospringfinal.service;

import com.daw2.proyectospringfinal.model.entity.Proveedor;

import java.util.List;

public interface ProveedoresService {
    Proveedor save(Proveedor proveedor);
    List<Proveedor> listAll();
    Proveedor getByNif(String nif);
    List<Proveedor> listLastRows(int rows);
    void delete(int id);
    List<Proveedor> listByRazonSocial(String razonSocial);
    List<Proveedor> listByNif(String nif);
}
