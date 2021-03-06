package com.daw2final.trabajofinaljsp.model.dao;

import com.daw2final.trabajofinaljsp.model.entity.Proveedor;

public interface ProveedoresDao extends Dao<Proveedor, Integer> {
    Proveedor getByNif(String nif);
    boolean deleteByNif(String nif);
}
