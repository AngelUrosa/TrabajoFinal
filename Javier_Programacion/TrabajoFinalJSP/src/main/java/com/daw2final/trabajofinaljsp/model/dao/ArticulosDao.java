package com.daw2final.trabajofinaljsp.model.dao;

import com.daw2final.trabajofinaljsp.model.entity.Articulo;

import java.util.List;

public interface ArticulosDao extends Dao<Articulo, Integer> {
    List<Articulo> listAllFillProv();
}
