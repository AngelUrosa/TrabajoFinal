package com.daw2.proyectospringfinal.service;


import com.daw2.proyectospringfinal.model.entity.Articulo;
import java.util.List;

public interface ArticulosService {
    Articulo save(Articulo articulo);
    List<Articulo> listAll();
    Articulo getByRef(String nif);
    List<Articulo> listByDescripcion(String descripcion);
    List<Articulo> listByRef(String ref);
    List<Articulo> listLastRows(int rows);
    void delete(int id);
    List<Articulo> listByProveedor(int idProveedor);
}
